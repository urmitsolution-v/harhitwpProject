<?php

namespace App\Http\Controllers\Apis;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MenuCategory;
use App\Models\Blogmodel;
use App\Models\Contact;
use App\Models\Highlight;
use Illuminate\Support\Facades\Validator;
use App\Models\WhoWeAre;
use App\Models\Category;
use App\Models\Team;
use App\Models\Banners;
use App\Models\Career;
use App\Models\Insights;
use App\Models\Whoitems;
use App\Models\Investment;
use App\Models\Publication;
use App\Models\PublicationSetting;
use App\Models\FaqSetting;
use App\Models\Faq;
use App\Models\ImpactStory;
use App\Models\GlobalDpiSummit;
use App\Models\GlobalDpiSummitLogo;
use App\Models\InclusivityPulse;
use App\Models\InclusivityPulseEditor;
use App\Models\Info;
use App\Models\Partner;
use App\Models\GlobalDpiSummitHighlight;
use App\Models\Country;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;


class Navigationcontroller extends Controller
{
   public function getMainMenus()
    {
        $menus = MenuCategory::where('type', 'category')
            ->where('status', 'Y')
            ->select('id', 'title', 'slug')
            ->get();

        return response()->json([
            'success' => true,
            'menus' => $menus
        ]);
    }

    // Get submenus for given menu_id (parent_category)
    public function getSubMenus($menu_id)
    {
        $submenus = MenuCategory::where('parent_category', $menu_id)
            ->where('status', 'Y')
            ->get();

        return response()->json([
            'success' => true,
            'submenus' => $submenus
        ]);
    }
 
 public function getPageBySlug($slug)
{
    $page = MenuCategory::where('slug', $slug)->where('status', 1)->first();

    if (!$page) {
        return response()->json([
            'status' => false,
            'message' => 'Page not found',
        ], 404);
    }

    // Handle breadcump_data
    $breadcumpData = json_decode($page->breadcump_data, true) ?? [];
      $contentSections = json_decode($page->contentsection, true) ?? [];

    // Handle tools section sorted by position
    $tools = json_decode($page->tools, true) ?? [];
    $sortedTools = collect($tools)
        ->sortBy('position')
        ->values()
        ->toArray();

    return response()->json([
        'status' => true,
        'message' => 'Page data fetched successfully',
        'data' => [
            'id' => $page->id,
            'title' => $page->title,
            'slug' => $page->slug,
            'type' => $page->type,
            'position' => $page->position,
            'parent_category' => $page->parent_category,
            'breadcump_data' => $breadcumpData,
            'contentsection' => $contentSections,
            'tools' => $sortedTools,
        ],
    ]);
}

 
 public function blogs()
{
    $blogs = Blogmodel::with('get_Category') // only fetch id and name
        ->where('status', 'Y')
        ->orderBy('id', 'desc')
        ->get();

    // Optionally modify the data to return category name directly
    $data = $blogs->map(function ($blog) {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'slug' => $blog->slug,
            'short_description' => $blog->short_description,
            'description' => $blog->description,
            'image' => asset('uploads/' . $blog->image),
            'category' => $blog->get_Category ? $blog->get_Category->title : null,
            'meta_title' => $blog->meta_title,
            'meta_tags' => $blog->meta_tags,
            'meta_description' => $blog->meta_description,
            'created_at' => $blog->created_at->format('Y-m-d'),
        ];
    });

     $setting = Info::find(28);
    $content = [
        'title' => '',
        'subtitle' => '',
        'meta_title' => '',
        'meta_tags' => '',
        'meta_description' => '',
        'image' => null,
    ];

    if ($setting && $setting->info_one) {
        $decoded = json_decode($setting->info_one, true);
        $content = array_merge($content, $decoded);
    }

    // If image is present
    if ($setting && $setting->image) {
        $content['image'] = asset('uploads/' . $setting->image);
    }

    return response()->json([
        'success' => true,
        'data' => $data,
        'content' => $content
    ]);
}

public function gethomeblogs()
{
    $blogs = Blogmodel::with('get_Category') // only fetch id and name
        ->where('status', 'Y')
        ->where('show_home_page', 'Y')
        ->latest()
        ->take(3)
        ->get();

    // Optionally modify the data to return category name directly
    $data = $blogs->map(function ($blog) {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'slug' => $blog->slug,
            'short_description' => $blog->short_description,
            'description' => $blog->description,
            'image' => asset('uploads/' . $blog->image),
            'category' => $blog->get_Category ? $blog->get_Category->title : null,
            'meta_title' => $blog->meta_title,
            'meta_tags' => $blog->meta_tags,
            'meta_description' => $blog->meta_description,
            'created_at' => $blog->created_at->format('Y-m-d'),
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $data
    ]);
}

public function blogCategories(Request $request)
{
    $query = Category::query();

    // Filter only active categories
    $query->where('status', 'Y')->where('type','blogs');

    // Optional filter by type
    if ($request->has('type') && !empty($request->type)) {
        $query->where('type', $request->type);
    }

    $categories = $query->orderBy('id', 'desc')->get(['id', 'title', 'type']);

    return response()->json([
        'success' => true,
        'data' => $categories
    ]);
}



public function searchBlogs(Request $request)
{
    $query = $request->input('query');

    $blogs = Blogmodel::with('get_Category')
        ->where('status', 'Y')
        ->where(function ($q) use ($query) {
            $q->where('title', 'like', '%' . $query . '%')
              ->orWhere('short_description', 'like', '%' . $query . '%')
              ->orWhere('description', 'like', '%' . $query . '%');
        })
        ->orderBy('id', 'desc')
        ->get();

    $data = $blogs->map(function ($blog) {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'slug' => $blog->slug,
            'short_description' => $blog->short_description,
            'description' => $blog->description,
            'image' => $blog->image ? asset('uploads/' . $blog->image) : null,
            'category' => $blog->get_Category ? $blog->get_Category->title : null,
            'meta_title' => $blog->meta_title,
            'meta_tags' => $blog->meta_tags,
            'meta_description' => $blog->meta_description,
            'created_at' => $blog->created_at->format('Y-m-d'),
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $data
    ]);
}


public function blogsByCategory(Request $request)
{
    $categoryId = $request->input('category_id');

    $blogs = Blogmodel::with('get_Category')
        ->where('status', 'Y')
        ->where('category', $categoryId)
        ->orderBy('id', 'desc')
        ->get();

    $data = $blogs->map(function ($blog) {
        return [
            'id' => $blog->id,
            'title' => $blog->title,
            'slug' => $blog->slug,
            'short_description' => $blog->short_description,
            'description' => $blog->description,
            'image' => $blog->image ? asset('uploads/' . $blog->image) : null,
            'category' => $blog->get_Category ? $blog->get_Category->title : null,
            'meta_title' => $blog->meta_title,
            'meta_tags' => $blog->meta_tags,
            'meta_description' => $blog->meta_description,
            'created_at' => $blog->created_at->format('Y-m-d'),
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $data
    ]);
}

public function submitContactForm(Request $request)
{
    // Manual validation
    $validator = Validator::make($request->all(), [
        'name' => ['required'],
        'email' => ['required', 'email'],
        'phone' => ['required', 'numeric', 'digits_between:7,15'],
        'message' => ['required'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors(),
        ], 422);
    }

    $contact = new Contact();
    $contact->name = $request->name;
    $contact->email = $request->email;
    $contact->phone = $request->phone;
    $contact->message = $request->message;
    $contact->save();

    return response()->json([
        'success' => true,
        'message' => 'Your inquiry has been successfully submitted!',
    ]);
}


public function getBlogDetail($slug)
{
    $blog = Blogmodel::with('get_Category')
        ->where('status', 'Y')
        ->where('slug', $slug)
        ->first();

    if (!$blog) {
        return response()->json([
            'status' => false,
            'message' => 'Blog not found',
        ], 404);
    }

    return response()->json([
        'status' => true,
        'message' => 'Blog details fetched successfully',
        'data' => [
            'id' => $blog->id,
            'title' => $blog->title,
            'short_description' => $blog->short_description,
            'banner' => $blog->banner ? asset($blog->banner) : null,
            'image' => $blog->image ? asset('uploads/'.$blog->image) : null,
            'description' => $blog->description,
            'meta_title' => $blog->meta_title,
            'meta_tags' => explode(',', $blog->meta_tags ?? ''),
            'meta_description' => $blog->meta_description,
            'category' => [
                'id' => $blog->get_Category?->id,
                'name' => $blog->get_Category?->name,
                'slug' => $blog->get_Category?->slug ?? '',
            ],
        ],
    ]);
}

public function whoWeAre()
{
       $data = WhoWeAre::first();
       $items = Whoitems::latest()->get();
    if ($data) {
        return response()->json([
            'status' => true,
            'message' => 'Who We Are data fetched successfully.',
            'data' => [$data],
            'items' => [$items]
        ]);
    } else {
        return response()->json([
            'status' => false,
            'message' => 'No data found.',
            'data' => null
        ], 404);
    }
}


public function getTeams(Request $request)
{
    $teams = Team::where('status', 'Y')->where('team_type',$request->team_type)->get()->map(function ($team) {
        $team->image = $team->image ? asset('team-image/' . $team->image) : null;
        return $team;
    });
    
     $setting = Info::find(27);
    $pageContent = [
        'title' => '',
        'subtitle' => '',
        'meta_title' => '',
        'meta_tags' => '',
        'meta_description' => ''
    ];

    if ($setting && $setting->info_one) {
        $decoded = json_decode($setting->info_one, true);
        $pageContent = array_merge($pageContent, $decoded);
    }
    
    return response()->json([
        'status' => true,
        'message' => 'Team list fetched successfully.',
        'data' => $teams,
        'page_content' => $pageContent
    ]);
}


public function getTeamsbyslug(Request $request, $slug)
{
    $team = Team::where('slug', $slug)
        ->where('status', 'Y')
        ->first();

    if ($team) {
        $team->image = $team->image ? asset('team-image/' . $team->image) : null;
    }

    return response()->json([
        'status' => true,
        'message' => 'Team fetched successfully.',
        'data' => $team
    ]);
}

  public function getBanners(Request $request)
    {
        $banners = Banners::where('status', 'Y')
            ->orderBy('id', 'desc')
            ->get([
                'id',
                'title',
                'description',
                'image',
                'url',
                'button_name',
                'button_link',
                'tab_option',
                'button_name2',
                'button_link2',
                'tab_option2',
            ]);

        // If image path needs full URL
        $banners->transform(function ($item) {
            $item->image = $item->image ? asset('uploads/' . $item->image) : null;
            return $item;
        });

        return response()->json([
            'status' => true,
            'data' => $banners
        ]);
    }

    public function getinsights(Request $request){
        $insights = Insights::where('status', 'Y')
        ->orderBy('id', 'desc')
        ->get();
        
    $data = $insights->map(function ($insights) {
        return [
            'id' => $insights->id,
            'title' => $insights->title,
            'slug' => $insights->slug,
            'short_description' => $insights->short_description,
            'description' => $insights->description,
            'image' => asset('uploads/' . $insights->image),
            'meta_title' => $insights->meta_title,
            'meta_tags' => $insights->meta_tags,
            'meta_description' => $insights->meta_description,
            'created_at' => $insights->created_at->format('Y-m-d'),
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $data
    ]);
    }

    
    public function gethomeinsights(Request $request){
        $insights = Insights::where('status', 'Y')->where('show_home_page','Y')
        ->latest()
        ->take(3)
        ->get();
        
    $data = $insights->map(function ($insights) {
        return [
            'id' => $insights->id,
            'title' => $insights->title,
            'slug' => $insights->slug,
            'description' => $insights->description,
            'image' => asset('uploads/' . $insights->image),
            'meta_title' => $insights->meta_title,
            'meta_tags' => $insights->meta_tags,
            'meta_description' => $insights->meta_description,
            'created_at' => $insights->created_at->format('Y-m-d'),
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $data
    ]);
    }
    public function insightdetails(Request $request , $slug){
        $insights = Insights::where('status', 'Y')->where('slug',$slug)
        ->firstorfail();
        
    
        return [
            'id' => $insights->id,
            'title' => $insights->title,
            'short_description' => $insights->short_description,
            'slug' => $insights->slug,
            'description' => $insights->description,
            'image' => asset('uploads/' . $insights->image),
            'meta_title' => $insights->meta_title,
            'meta_tags' => $insights->meta_tags,
            'meta_description' => $insights->meta_description,
            'created_at' => $insights->created_at->format('Y-m-d'),
        ];
    

    return response()->json([
        'success' => true,
        'data' => $data
    ]);
    }


    public function getCareer()
{
    $career = Career::first();

    if (!$career) {
        return response()->json([
            'success' => false,
            'message' => 'Career data not found.',
        ], 404);
    }

    $media = null;

    if ($career->media_type === 'youtube') {
        $media = [
            'type' => 'youtube',
            'url' => $career->youtube_link,
        ];
    } elseif ($career->media_type === 'file' && !empty($career->media_file)) {
        $media = [
            'type' => 'file',
            'url' => asset('uploads/' . $career->media_file),
        ];
    }

    return response()->json([
        'success' => true,
        'data' => [
            'title' => $career->title,
            'description' => $career->description,
            'lists' => $career->lists ?? [],
            'media' => $media,
            'page_design' => $career->page_design,
            'meta' => [
                'title' => $career->meta_title,
                'tags' => $career->meta_tags,
                'description' => $career->meta_description,
            ]
        ]
    ]);
}


public function getinvestments()
{
    try {
        $investment = Investment::first(); // Only one row, as per your logic

        if (!$investment) {
            return response()->json([
                'status' => false,
                'message' => 'No investment data found.'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'message' => 'Investment data fetched successfully.',
            'data' => [
                'id' => $investment->id,
                'title' => $investment->title,
                'sub_description' => $investment->sub_description,
                'todo_list' => $investment->todo_list,
                'meta_title' => $investment->meta_title,
                'meta_tags' => $investment->meta_tags,
                'meta_description' => $investment->meta_description,
            ]
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong!',
            'error' => $e->getMessage()
        ], 500);
    }
}

public function getpublications() {
    $setting = PublicationSetting::first();

        $publications = Publication::select([
            'id',
            'title',
            'description',
            'published_by',
            'image',
            'button_name',
            'button_url',
            'target',
        ])->get()->map(function ($pub) {
            return [
                'id'            => $pub->id,
                'title'         => $pub->title,
                'description'   => $pub->description,
                'published_by'  => $pub->published_by,
                'image_url'     => $pub->image ? asset('uploads/publications/' . $pub->image) : null,
                'button_name'   => $pub->button_name,
                'button_url'    => $pub->button_url,
                'target'        => $pub->target,
            ];
        });

        return response()->json([
            'success'      => true,
            'setting'      => [
                'title'             => $setting->title ?? '',
                'sub_description'   => $setting->sub_description ?? '',
                'meta_title'        => $setting->meta_title ?? '',
                'meta_tags'         => $setting->meta_tags ?? '',
                'meta_description'  => $setting->meta_description ?? '',
            ],
            'publications' => $publications,
        ]);
}

  public function getfaqs()
    {
        $setting = FaqSetting::first();
        $faqs = Faq::select('question', 'answer')->latest()->get();

        return response()->json([
            'status' => true,
            'message' => 'FAQ data fetched successfully',
            'data' => [
                'setting' => $setting,
                'faqs' => $faqs
            ]
        ]);
    }

    public function getimpactstories() {
         $stories = ImpactStory::select(
            'id',
            'title',
            'menu_title',
            'slug',
            'short_description',
            'content',
            'status',
            'image',
            'meta_title',
            'meta_tags',
            'meta_description',
            'created_at'
        )->where('status', 'active')
         ->orderBy('created_at', 'desc')
         ->get();

        return response()->json([
            'success' => true,
            'data' => $stories
        ]);
    }

    public function getglobaldpi() {
          $summit = GlobalDpiSummit::first();

        if (!$summit) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        $logos = GlobalDpiSummitLogo::where('summit_id', $summit->id)->get()->map(function ($logo) {
            return [
                'name' => $logo->logo_name,
                'image' => asset($logo->logo_image),
                
            ];
        });

        return response()->json([
            'section1' => [
                'banner_title' => $summit->banner_title,
                'banner_button_name' => $summit->banner_button_name,
                'banner_link' => $summit->banner_link,
                'banner_link_target' => $summit->banner_link_target,
                'banner_image' => $summit->banner_image ? asset($summit->banner_image) : null,
                'dpi_image' => $summit->dpi_image ? asset($summit->dpi_image) : null,
            ],
            'section2' => [
                'logos' => $logos,
            ],
            'section3' => [
                'content1_title' => $summit->content1_title,
                'content1_description' => $summit->content1_description,
                'content1_image' => $summit->content1_image ? asset($summit->content1_image) : null,
                'content1_style' => $summit->content1_style,
            ],
            'section4' => [
                'image_section' => $summit->image_section ? asset($summit->image_section) : null,
            ],
            'section5' => [
                'content2_title' => $summit->content2_title,
                'content2_description' => $summit->content2_description,
                'content2_image' => $summit->content2_image ? asset($summit->content2_image) : null,
                'content2_style' => $summit->content2_style,
            ],
            'meta' => [
                'title' => $summit->meta_title,
                'tags' => $summit->meta_tags,
                'description' => $summit->meta_description,
            ]
        ]);
    }
    
public function getInclusivityPulseData()
{
    try {
        $pulse = InclusivityPulse::with(['editors', 'teams'])->first();

        if (!$pulse) {
            return response()->json([
                'status' => false,
                'message' => 'Inclusivity Pulse data not found.',
                'data' => null
            ], 404);
        }

        // Return all fields of teams
        $formatTeam = function ($team) {
            return [
                'id' => $team->id,
                'name' => $team->name,
                'sub_title' => $team->sub_title,
                'phone' => $team->phone,
                'slug' => $team->slug,
                'email' => $team->email,
                'show_about' => $team->show_about,
                'image' => $team->image ? asset('team-image/' . $team->image) : null,
                'since' => $team->since,
                'description' => $team->description,
                'experience' => $team->experience,
                'address' => $team->address,
                'facebook' => $team->facebook,
                'twitter' => $team->twitter,
                'instagram' => $team->instagram,
                'status' => $team->status,
            ];
        };

        $response = [
            'banner' => [
                'title' => $pulse->banner_title,
                'sub_description' => $pulse->banner_subdescription,
                'image_url' => $pulse->banner_image ? asset($pulse->banner_image) : null,
            ],
            'content' => [
                'title' => $pulse->content_title,
                'description' => $pulse->content_description,
                'layout' => $pulse->content_layout,
                'image_url' => $pulse->content_image ? asset($pulse->content_image) : null,
            ],
            'cms' => [
                'title' => $pulse->cms_title,
                'cms_editor' => $pulse->cms_editor,
                'cms_image' => $pulse->cms_image ? asset($pulse->cms_image) : null,
            ],
            'timeline' => [
                'title' => $pulse->timeline_title,
                'image_url' => $pulse->timeline_image ? asset($pulse->timeline_image) : null,
            ],
            'seo' => [
                'meta_title' => $pulse->meta_title,
                'meta_tags' => $pulse->meta_tags,
                'meta_description' => $pulse->meta_description,
            ],
            'editors' => $pulse->editors->map(function ($editor) {
                return [
                    'layout' => $editor->editor_layout,
                    'content' => $editor->editor_content,
                ];
            }),
            'all_teams' => $pulse->teams ?? [],
        ];

        return response()->json([
            'status' => true,
            'message' => 'Inclusivity Pulse data fetched successfully.',
            'data' => $response
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'message' => 'Something went wrong: ' . $e->getMessage(),
        ], 500);
    }
}

public function getAboutUsData() {
    $info = Info::find(7);

    if (!$info) {
        return response()->json([
            'status' => false,
            'message' => 'About Us data not found.'
        ], 404);
    }
    $decoded = json_decode($info->info_one, true);
    return response()->json([
        'status' => true,
        'message' => 'About Us data fetched successfully.',
        'data' => [
            'short_description_left' => $decoded['headline'] ?? '',
            'title' => $decoded['title'] ?? '',
            'button_name' => $decoded['button_name'] ?? '',
            'button_url' => $decoded['button_url'] ?? '',
            'show_button' => $decoded['show_button'] ?? '',
            'button_target' => $decoded['button_target'] ?? '',
            // 'meta_title' => $decoded['meta_title'] ?? '',
            // 'meta_tags' => $decoded['meta_tags'] ?? '',
            // 'meta_description' => $decoded['meta_description'] ?? '',
            'right_longDescription' => $info->aboutlongtext ?? '',
            'image' => $info->image ? asset($info->image) : null,
            // 'image_2' => $info->image_2 ? asset($info->image_2) : null,
            // 'image_3' => $info->image3 ? asset($info->image3) : null,
        ]
    ]); 
}

public function infrastructureThinkingApi(Request $request)
{
    $info = Info::find(25);

    if (!$info) {
        return response()->json([
            'status' => false,
            'message' => 'Data not found for Infrastructure Thinking.'
        ], 404);
    }
    $decoded = json_decode($info->info_one, true);

    return response()->json([
        'status' => true,
        'message' => 'Infrastructure Thinking data fetched successfully.',
        'data' => [
            'title' => $decoded['title'] ?? '',
            'section_layout' => $decoded['section_layout'] ?? '',
            'long_description' => $info->aboutlongtext ?? '',
            'image_2' => $info->image_2 ? asset('uploads/'.$info->image_2) : null,
        ]
    ]);
}


public function governmentSolutionsApi(Request $request)
{
    $info = Info::find(26);

    if (!$info) {
        return response()->json([
            'status' => false,
            'message' => 'Data not found for Government Solutions.'
        ], 404);
    }

    $decoded = json_decode($info->info_one, true);
    return response()->json([
        'status' => true,
        'message' => 'Government Solutions data fetched successfully.',
        'data' => [
            'title' => $decoded['title'] ?? '',
            'short_description' => $decoded['short_description'] ?? '',
            'button_name' => $decoded['button_name'] ?? '',
            'button_url' => $decoded['button_url'] ?? '',
            'show_button' => $decoded['show_button'] ?? '',
            'button_target' => $decoded['button_target'] ?? '',
            'long_description' => $info->aboutlongtext ?? '',
            'image_2' => $info->image_2 ? asset('uploads/'.$info->image_2) : null,
        ]
    ]);
}

public function homePartnersApi()
{
    $partners = Partner::where('status', 'Y')->where('type','partner')->get()->map(function ($item) {
        return [
            'id' => $item->id,
            'image' => $item->image ? asset('uploads/'.$item->image) : null,
            'created_at' => $item->created_at->format('Y-m-d'),
        ];
    });

    return response()->json([
        'status' => true,
        'message' => 'Partners fetched successfully.',
        'data' => $partners
    ]);
}

public function InvestmentPartnersApi()
{
    $partners = Partner::where('status', 'Y')->where('type','investment')->get()->map(function ($item) {
        return [
            'id' => $item->id,
            'title' => $item->title,
            'redirect_url' => $item->redirect_url,
            'image' => $item->image ? asset('uploads/'.$item->image) : null,
            'created_at' => $item->created_at->format('Y-m-d'),
        ];
    });

    return response()->json([
        'status' => true,
        'message' => 'Partners fetched successfully.',
        'data' => $partners
    ]);
}

 public function getGdsHighlights()
    {
        $dpi = GlobalDpiSummitHighlight::first();

        if (!$dpi) {
            return response()->json([
                'status' => false,
                'message' => 'No highlights found.',
                'data' => null,
            ], 404);
        }

        $dpi->logo = $dpi->logo ? asset($dpi->logo) : null;

        return response()->json([
            'status' => true,
            'message' => 'GDS Highlights fetched successfully.',
            'data' => $dpi,
        ]);
    }


 public function countries()
{
    $countries = Country::where('status', 'Y')->get()->map(function ($country) {
        if ($country->type == 'single') {
            return [
                'id' => $country->id,
                'type' => 'single',
                'name' => $country->name,
                'slug' => \Str::slug($country->name),
                'image' => asset($country->image),
            ];
        } else {
            return [
                'id' => $country->id,
                'type' => 'group',
                'names' => $country->name,
                'slug' => $country->slug,
                'images' => collect(json_decode($country->images ?? '[]'))->map(function ($img) {
                    return asset($img);
                }),
            ];
        }
    });

    return response()->json([
        'status' => true,
        'data' => $countries,
    ]);
}
 

public function countryDetails($slug)
{
    $country = Country::where('status', 'Y')->where('slug',$slug)->first();

    // $country = $all->first(function ($c) use ($slug) {
    //     if ($c->type == 'single') {
    //         return \Str::slug($c->name) === $slug;
    //     } else {
    //         $names = json_decode($c->name ?? '[]');
    //         return collect($names)->contains(function ($n) use ($slug) {
    //             return \Str::slug($n) === $slug;
    //         });
    //     }
    // });

    if (!$country) {
        return response()->json([
            'status' => false,
            'message' => 'Country not found',
        ], 404);
    }

    // Content & image handling
    $response = [
        'id' => $country->id,
        'type' => $country->type,
        'title' => $country->content->title ?? "",
        'slug' => $slug,
    ];

    if ($country->type === 'single') {
        $response['name'] = $country->name;
        $response['image'] = asset($country->image);
    } else {
        $response['names'] = json_decode($country->name ?? '[]');
        $response['images'] = collect(json_decode($country->images ?? '[]'))->map(fn ($img) => asset($img));
    }

    // Content
    $response['content'] = [
        'description' => $country->content->description ?? null,
        'youtube_iframe' => $country->content->youtube_iframe ?? null,
        'button_name' => $country->content->button_name ?? null,
        'button_link' => $country->content->button_link ?? null,
        'button_target' => $country->content->button_target ?? '_self',
        'layout' => $country->content->layout ?? 'left',
      
    ];

    // Meta tags
    $response['seo'] = [
          'meta_title' => $country->content->meta_title ?? null,
        'meta_description' => $country->content->meta_description ?? null,
        'meta_tags' => $country->content->meta_tags ?? null,
    ];

    return response()->json([
        'status' => true,
        'data' => $response,
    ]);
}


public function subscribe(Request $request)
{
    $request->validate([
        'email' => 'required|email|unique:subscribers,email',
    ]);
    $subscriber = Subscriber::create([
        'email' => $request->email,
    ]);
    Mail::to($subscriber->email)->send(new SubscriptionMail(['email' => $subscriber->email], 'user'));
    Mail::to('admin@codevelop.in')->send(new SubscriptionMail(['email' => $subscriber->email], 'admin'));
    return response()->json([
        'status' => true,
        'message' => 'Subscription successful. Confirmation email sent.',
    ]);
}
 
 public function getGeneralSetting()
    {
        $data = Info::findOrFail(5);

        $info = json_decode($data->info_one, true);

        return response()->json([
            'status' => true,
            'data' => [
                'image' => asset('uploads/' . $data->image),
                'favicon' => asset('uploads/' . $data->favicon),
                'settings' => $info,
            ]
        ]);
    }
 
    public function highlights(){
        
        $highlights = Highlight::orderBy('id', 'desc')->get()->map(function ($highlight) {
            return [
                'id' => $highlight->id,
                'title' => $highlight->title,
                'subtitle' => $highlight->subtitle,
                'month' => $highlight->month,
                'year' => $highlight->year,
                'url' => $highlight->url,
                'status' => $highlight->status,
                'image_url' => $highlight->image ? asset($highlight->image) : null,
                'created_at' => $highlight->created_at,
                'updated_at' => $highlight->updated_at,
            ];
        });

        return response()->json([
            'status' => true,
            'data' => $highlights,
        ]);
    }
 
    
      public function getImpact()
    {
        $row = Info::find(29);

        if (!$row) {
            return response()->json([
                'status' => false,
                'message' => 'Impact data not found.',
            ], 404);
        }

        return response()->json([
            'status' => true,
            'title' => $row->info_one,
            'data' => json_decode($row->info_two),
        ]);
    }
 
    
    public function getEventHighlight()
{
    $info = Info::find(30);

    if (!$info) {
        return response()->json([
            'status' => false,
            'message' => 'Event Highlight not found.'
        ], 404);
    }

    $infoOne = json_decode($info->info_one, true);

    return response()->json([
        'status' => true,
        'data' => [
            'title'         => $infoOne['title'] ?? '',
            'subtitle'      => $infoOne['subtitle'] ?? '',
            'button_name'   => $infoOne['button_name'] ?? '',
            'button_url'    => $infoOne['button_url'] ?? '',
            'button_target' => $infoOne['button_target'] ?? '',
            'show_button'   => $infoOne['show_button'] ?? false,
            'description'   => $info->info_two ?? '',
            'image_1'       => $info->image1 ? asset('uploads/' . $info->image1) : null,
            'image_2'       => $info->image2 ? asset('uploads/' . $info->image2) : null,
            'image_3'       => $info->image3 ? asset('uploads/' . $info->image3) : null,
        ]
    ]);
}

}