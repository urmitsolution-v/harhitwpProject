<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Faq;
use App\Models\Info;
use App\Models\WorkingProcess;
use App\Models\Pagesetting;
use App\Models\Partner;
use App\Models\Testimonials;
use App\Models\Whoitems;
use App\Models\Career;
use App\Models\Investment;
use App\Models\WhoWeAre;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables; 
use App\Models\GlobalDpiSummit;
use App\Models\GlobalDpiSummitLogo;
use App\Models\GlobalDpiSummitHighlight;
use App\Models\Country;
use Illuminate\Support\Facades\File;
use App\Models\CountryContent;

class Pagecontroller extends Controller
{
    public function counteradd(Request $request)
    {
        if ($request->method() == 'POST') {
            $counters = [
                'title1' => $request->title1,
                'title2' => $request->title2,
                'title3' => $request->title3,
                'title4' => $request->title4,
                'title5' => $request->title5,
                'value1' => $request->value1,
                'value2' => $request->value2,
                'value3' => $request->value3,
                'value4' => $request->value4,
                'value5' => $request->value5,

            ];
            $new = Info::find(16);
            if (! $new) {
                $new = new Info;  
                $new->id = 16;
            }
            $new->info_one = json_encode($counters);

            $new->save();

            return redirect()->back()->with('success', 'Successfully Updated');
        }
        $counters = Info::find(16);
        $row = $counters ? json_decode($counters->info_one) : null;

        return view('admin.counters', compact('counters', 'row'));
    }


    public function workingadd(Request $request)
    {
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => ['required'],
                'desc' => ['required'],
                'subtitle' => ['required'],
                'title1' => ['required'],
                'desc1' => ['required'],
                'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],  // Validate image type and size
            ]);
            $work_data = [
                'title' => $request->title,
                'desc' => $request->desc,
                'subtitle' => $request->subtitle,
                'title1' => $request->title1,
                'desc1' => $request->desc1,
            ];
            $new = Info::find(14);
            if (! $new) {
                $new = new Info;  // Create a new instance if not found
                $new->id = 14;  // Assign the ID manually, ensuring it doesn't conflict with auto-increment
            }
            $new->info_one = json_encode($work_data);
            if ($request->hasFile('image')) {
                $new->image = updateImage($request->file('image'), $new, 'image');
            }
            $new->save();
        }
        $work_data = Info::find(14);
        $row12 = $work_data ? json_decode($work_data->info_one) : null;

        return view('admin.working.add', compact('work_data', 'row12'));
    }

    public function skillsadd(Request $request)
    {
        if ($request->method() == 'POST') {
            // Validate input data
            // $validatedData = $request->validate([
            //     'title_1' => ['required'],
            //     'desc_1' => ['required'],
            //     'btn_1' => ['required'],
            //     'image' => ['required|image'],  // Validate image (required and must be an image)

            //     'title_2' => ['required'],
            //     'desc_2' => ['required'],
            //     'btn_2' => ['required'],
            //     'btnurl_2' => ['required'],

            //     'title_3' => ['required'],
            //     'desc_3' => ['required'],
            //     'btn_3' => ['required'],
            //     'btnurl_3' => ['required'],
            // ]);

            // Prepare data for each Welcome Box
            $data1 = [
                'title' => $request->title_1,
                'desc' => $request->desc_1,
                // 'btn' => $request->btn_1,
                'image' => $request->hasFile('image') ? $this->uploadImage($request->file('image')) : null, // handle image upload
            ];

            $data2 = [
                'title' => $request->title_2,
                'desc' => $request->desc_2,
                'btn' => $request->btn_2,
                'btnurl' => $request->btnurl_2,
            ];

            $data3 = [
                'title' => $request->title_3,
                'desc' => $request->desc_3,
                'btn' => $request->btn_3,
                'btnurl' => $request->btnurl_3,
            ];

            $welcomeBox1 = Info::find(11);
            if ($welcomeBox1) {
                $welcomeBox1->info_one = json_encode($data1);
                $welcomeBox1->save();
            } else {
                $welcomeBox1 = new Info;
                $welcomeBox1->id = 11;
                $welcomeBox1->info_one = json_encode($data1);
                $welcomeBox1->save();
            }

            $welcomeBox2 = Info::find(12);
            if ($welcomeBox2) {
                $welcomeBox2->info_one = json_encode($data2);
                $welcomeBox2->save();
            } else {
                $welcomeBox2 = new Info;
                $welcomeBox2->id = 12;
                $welcomeBox2->info_one = json_encode($data2);
                $welcomeBox2->save();
            }
            $welcomeBox3 = Info::find(13);
            if ($welcomeBox3) {
                $welcomeBox3->info_one = json_encode($data3);
                $welcomeBox3->save();
            } else {
                $welcomeBox3 = new Info;
                $welcomeBox3->id = 13;
                $welcomeBox3->info_one = json_encode($data3);
                $welcomeBox3->save();
            }

            return redirect()->back()->with('success', 'Successfully Updated');
        }
        $data1 = Info::find(11);
        $row1 = $data1 ? json_decode($data1->info_one) : null;

        $data2 = Info::find(12);
        $row2 = $data2 ? json_decode($data2->info_one) : null;

        $data3 = Info::find(13);
        $row3 = $data3 ? json_decode($data3->info_one) : null;

        return view('admin.skills.add', compact('data1', 'row1', 'data2', 'row2', 'data3', 'row3'));
    }

    public function uploadImage($image)
    {
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $imageName);

        return 'uploads/' . $imageName;
    }

    public function home_banners(Request $request)
    {

        if ($request->ajax()) {
            $data = Banners::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="/admin/delete/banners/' . $row->id . '/no_image" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            Delete
        </a>
        <a href="/admin/banners-edit/' . $row->id . '"  class="btn btn-sm btn-primary">
           Edit
        </a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        // $data = Banners::orderBy('id', 'desc')->get();

        return view('admin.banners.index');
    }
    public function workingprocess(Request $request)
    {

        if ($request->ajax()) {
            $data = WorkingProcess::query(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<a href="/admin/delete/workingprocess/' . $row->id . '/no_image" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete"></i>
        </a>
        <a href="/admin/workingprocess-edit/' . $row->id . '"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline"></i>
        </a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        // $data = Banners::orderBy('id', 'desc')->get();

        return view('admin.workingprocess.index');
    }

    public function createworkingproces(Request $request){
        if ($request->method() == "POST") {
            if ($request->method() == 'POST') {
                $validatedData = $request->validate([
                    'title' => ['required'],
                    // 'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
                ]);
    
                $new = new WorkingProcess;
                $new->title = $request->title;
                $new->description = $request->description;
                $new->status = $request->status;
                $new->save();
                return redirect('admin/working-process')->with('success', 'Created Successfully');
            }
        }else{
            return view('admin.workingprocess.add'); 
        }
    }
    
    
    public function workingprocessedit(Request $request,$id){
        $new = WorkingProcess::findorfail($id);

        if ($request->method() == "POST") {

            if ($request->method() == 'POST') {
                $validatedData = $request->validate([
                    'title' => ['required'],
                    // 'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
                ]);
    
                $new->title = $request->title;
                $new->description = $request->description;
                $new->status = $request->status;
                $new->save();
                return redirect('admin/working-process')->with('success', 'Created Successfully');
            }
        }else{
            return view('admin.workingprocess.edit',compact('new')); 
        }
    }

    public function homeadd(Request $request)
    {
        if ($request->method() == 'POST') {
            // Validate input data
            $validatedData = $request->validate([
                'title_1' => ['required'],
                'desc_1' => ['required'],
                'btn_1' => ['required'],
                'btnurl_1' => ['required'],

                'title_2' => ['required'],
                'desc_2' => ['required'],
                'btn_2' => ['required'],
                'btnurl_2' => ['required'],

                'title_3' => ['required'],
                'desc_3' => ['required'],
                'btn_3' => ['required'],
                'btnurl_3' => ['required'],
            ]);

            // Prepare data for each Welcome Box
            $data1 = [
                'title' => $request->title_1,
                'desc' => $request->desc_1,
                'btn' => $request->btn_1,
                'btnurl' => $request->btnurl_1,
            ];

            $data2 = [
                'title' => $request->title_2,
                'desc' => $request->desc_2,
                'btn' => $request->btn_2,
                'btnurl' => $request->btnurl_2,
            ];

            $data3 = [
                'title' => $request->title_3,
                'desc' => $request->desc_3,
                'btn' => $request->btn_3,
                'btnurl' => $request->btnurl_3,
            ];

            // Save Welcome Box 1 (ID 8)
            $welcomeBox1 = Info::find(8);
            if ($welcomeBox1) {
                $welcomeBox1->info_one = json_encode($data1);
                $welcomeBox1->save();
            } else {
                $welcomeBox1 = new Info;
                $welcomeBox1->id = 8;
                $welcomeBox1->info_one = json_encode($data1);
                $welcomeBox1->save();
            }

            // Save Welcome Box 2 (ID 9)
            $welcomeBox2 = Info::find(9);
            if ($welcomeBox2) {
                $welcomeBox2->info_one = json_encode($data2);
                $welcomeBox2->save();
            } else {
                $welcomeBox2 = new Info;
                $welcomeBox2->id = 9;
                $welcomeBox2->info_one = json_encode($data2);
                $welcomeBox2->save();
            }

            // Save Welcome Box 3 (ID 10)
            $welcomeBox3 = Info::find(10);
            if ($welcomeBox3) {
                $welcomeBox3->info_one = json_encode($data3);
                $welcomeBox3->save();
            } else {
                $welcomeBox3 = new Info;
                $welcomeBox3->id = 10;
                $welcomeBox3->info_one = json_encode($data3);
                $welcomeBox3->save();
            }

            return redirect()->back()->with('success', 'Successfully Updated');
        }

        // Retrieve data for each Welcome Box
        $data1 = Info::find(8);
        $row1 = $data1 ? json_decode($data1->info_one) : null;

        $data2 = Info::find(9);
        $row2 = $data2 ? json_decode($data2->info_one) : null;

        $data3 = Info::find(10);
        $row3 = $data3 ? json_decode($data3->info_one) : null;

        return view('admin.welcomebox.add', compact('data1', 'row1', 'data2', 'row2', 'data3', 'row3'));
    }

    public function createbanner(Request $request)
    {
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => ['required'],
                // 'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
            ]);

            $new = new Banners;
            $new->title = $request->title;
            // $new->description = $request->description;
            $new->status = $request->status;
            // $new->url = $request->url;
            // $new->button_name = $request->button_name;
            // $new->button_link = $request->button_link;
            // $new->tab_option = $request->tab_option;
            // $new->button_name2 = $request->button_name2;
            // $new->button_link2 = $request->button_link2;
            // $new->tab_option2 = $request->tab_option2;
            if ($request->image) {
                $new->image = uploadImage($request->image, $new, 'image');
            }
            $new->save();

            return redirect('admin/banners')->with('success', 'Created Successfully');
        }

        return view('admin.banners.add');
    }

    public function bannersedit(Request $request, $id)
    {
        $row = Banners::findorfail($id);

        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => ['required'],
                // 'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
            ]);

            $row->title = $request->title;
            $row->description = $request->description;
            $row->status = $request->status;
              $row->url = $request->url;
            $row->button_name = $request->button_name;
            $row->button_link = $request->button_link;
            $row->tab_option = $request->tab_option;
             $row->button_name2 = $request->button_name2;
            $row->button_link2 = $request->button_link2;
            $row->tab_option2 = $request->tab_option2;
            if ($request->image) {
                $row->image = updateImage($request->image, $row, 'image');
            }
            $row->save();

            return redirect('admin/banners')->with('success', 'Update Successfully');
        }

        return view('admin.banners.edit', compact('row'));
    }

    public function seomanagement(Request $request)
    {
        if ($request->ajax()) {
            $data = Pagesetting::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('updated_at', function ($row) {
                    return Carbon::parse($row->updated_at)->format('d-m-Y h:i A');
                })
                ->addColumn('action', function ($row) {
                    if (isset($row->image)) {
                        $image = $row->image;
                    } else {
                        $image = $row->image;
                    }
                    return '
        <a href="/admin/edit-page/' . $row->id . '"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline"></i>
        </a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }


        return view('admin.page-setting.index');
    }

    public function deletepage($id)
    {
        $daata = Pagesetting::find($id);
        if ($daata->image) {
            $imagePath = public_path('uploads/' . $daata->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);  // Delete the image file
            }
        }
        $daata->delete();

        return redirect('/admin/seo-management')->with('success', ' deleted successfully');
    }

    public function newpage(Request $request)
    {

        if ($request->method() == 'POST') {
            // $validatedData = $request->validate([
            //     'title' => ['required'],
            //     // 'short_description' => ['required'],
            //     'meta' => ['required'],
            //     'tag' => ['required'],
            //     'meta_d' => ['required'],
            //     'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
            // ]);

            $newpage = new Pagesetting;
            $newpage->title = $request->title;
            $newpage->slug = Str::slug($request->title);
            $newpage->pagename = $request->pagename;
            $newpage->short_desc = $request->short_desc;
            $newpage->bradcump_title = $request->bradcump_title;
            $newpage->pagesubtitle = $request->pagesubtitle;
            $newpage->pagetitle = $request->pagetitle;
            $newpage->description = $request->description;
            $newpage->meta = $request->meta;
            $newpage->tag = $request->tag;
            $newpage->meta_d = $request->meta_d;
            $newpage->status = $request->status;

            if ($request->image) {
                $newpage->image = uploadImage($request->image, $newpage, 'image');
            }
            $newpage->save();

            return redirect('/admin/seo-management')->with('success', 'Created Successfully');
        }

        return view('admin.page-setting.add');
    }

    public function editpage(Request $request, $id)
    {
        $newpage = Pagesetting::findOrFail($id);
        if ($request->method() == 'POST') {
            // $validatedData = $request->validate([
            //     'title' => ['required'],
            //     // 'short_description' => ['required'],
            //     'meta_title' => ['required'],
            //     'meta_tags' => ['required'],
            //     'meta_description' => ['required'],
            //     'banner' => ['mimes:jpeg,png,jpg,gif,svg', 'max:3048'],
            // ]);

            $newpage->title = $request->title;
            $newpage->pagename = $request->pagename;
            $newpage->bradcump_title = $request->bradcump_title;
            $newpage->description = $request->description;
            $newpage->short_desc = $request->short_desc;
            $newpage->meta = $request->meta;
            $newpage->tag = $request->tag;
            $newpage->pagesubtitle = $request->pagesubtitle;
            $newpage->pagetitle = $request->pagetitle;
            $newpage->meta_d = $request->meta_d;
            $newpage->status = $request->status;
            $slug = Str::slug($request->title);
            if (Pagesetting::where('slug', $slug)->where('id', '!=', $newpage->id)->exists()) {
                $slug = $slug . '-' . uniqid();
            }

            $newpage->slug = $slug;

            if ($request->image) {
                $newpage->image = updateImage($request->image, $newpage, 'image');
            }
            $newpage->save();
            if($id == 30){
            return redirect('/admin/working-process')->with('success', 'Update Successfully');

            }else{
            return redirect('/admin/seo-management')->with('success', 'Update Successfully');
        }
    }

        return view('admin.page-setting.edit', compact('newpage'));
    }

    public function franchise(Request $request)
    {

        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => ['required'],
                'description' => ['required'],
                'total_franchise' => ['required', 'numeric'],
                'total_staff' => ['required', 'numeric'],
                'placed_student' => ['required', 'numeric'],
                'b_title' => ['required'],
                'b_description' => ['required'],
                'meta_title' => ['required'],
                'meta_tags' => ['required'],
                'meta_description' => ['required'],
                'image' => ['mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            ]);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'total_franchise' => $request->total_franchise,
                'total_staff' => $request->total_staff,
                'placed_student' => $request->placed_student,
                'b_title' => $request->b_title,
                'b_description' => $request->b_description,
                'meta_title' => $request->meta_title,
                'meta_tags' => $request->meta_tags,
                'meta_description' => $request->meta_description,
            ];

            $new = Info::find(4);
            $new->info_one = json_encode($data);
            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            $new->save();

            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::findOrFail(4);
        $row = json_decode($data->info_one);

        return view('superadmin.franchise', compact('row', 'data'));
    }

    public function partners(Request $request)
    {
        
        if(!isset($request->type) && empty($request->type)){
            abort(404);
        }
        
        $data = Partner::where('type',$request->type)->orderBy('id', 'desc')->paginate(20);

        return view('superadmin.partners.index', compact('data'));
    }

    public function new_partner(Request $request)
    {
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                // 'title' => ['required'],
                'image' => ['required', 'mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            ]);

            $partner = new Partner;
            $partner->title = $request->title;
            $partner->status = $request->status;
            $partner->redirect_url = $request->redirect_url;
            $partner->type = $request->type;

            if ($request->image) {
                $partner->image = uploadImage($request->image, $partner, 'image');
            }
            $partner->save();

            return redirect('/admin/partners?type='.$request->type.'')->with('success', 'Created Successfully');
        }

        return view('superadmin.partners.add');
    }

    public function editpartners(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                // 'title' => ['required'],
                'image' => ['mimes:jpeg,png,jpg,gif,svg,webp', 'max:2048'],
            ]);
            $partner->title = $request->title;
            $partner->redirect_url = $request->redirect_url;
            $partner->status = $request->status;
            $partner->type = $request->type;
            if ($request->image) {
                $partner->image = updateImage($request->image, $partner, 'image');
            }
            $partner->save();

            return redirect('/admin/partners?type='.$request->type.'')->with('success', 'Update Successfully');
        }

        return view('superadmin.partners.edit', compact('partner'));
    }

    public function terms(Request $request)
    {
        if ($request->method() == 'POST') {
            $new = Info::find(1);
            $new->info_one = $request->description;
            $new->save();

            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(1);

        return view('admin.pages.terms', compact('data'));
    }

    public function editplacements(Request $request)
    {
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'title' => ['required'],
                'description' => ['required'],
                'meta_title' => ['required'],
                'yt_links' => ['required'],
                'meta_tags' => ['required'],
                'meta_description' => ['required'],
                'image' => ['max:2048'],
                'image_2' => ['max:2048'],
            ]);

            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'yt_links' => $request->yt_links,
                'meta_title' => $request->meta_title,
                'meta_tags' => $request->meta_tags,
                'meta_description' => $request->meta_description,
            ];

            $new = Info::find(6);
            $new->info_one = json_encode($data);
            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            $new->save();

            return redirect()->back()->with('success', 'Updated Successfully');
        } else {

            $new = Info::find(6);
            $row = json_decode($new->info_one);

            return view('superadmin.placements.placements', compact('row', 'new'));
        }
    }

    public function genralsetting(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = Info::findOrFail(5);

            $validatedData = $request->validate([
                'image' => ['max:2048'],
                'favicon' => ['max:2048'],
            ]);

            $info = [
                'phone' => $request->phone,
                // 'phone_2' => $request->phone_2,
                'email' => $request->email,
                'location' => $request->location,
                'footer_location' => $request->footer_location,
                'location_iframe' => $request->location_iframe,
                'meta_title' => $request->meta_title,
                'meta_tags' => $request->meta_tags,
                'meta_description' => $request->meta_description,
                'twitter' => $request->twitter,
                'facebook' => $request->facebook,
                'linkedin' => $request->linkedin,
                'youtube' => $request->youtube,
                'instagram' => $request->instagram,
                'timing_hours' => $request->timing_hours,
            ];

            $data->info_one = json_encode($info);
            if ($request->image) {
                $data->image = updateImage($request->image, $data, 'image');
            }

            if ($request->favicon) {
                $data->favicon = updateImage($request->favicon, $data, 'favicon');
            }

            $data->save();

            return redirect()->back()->with('success', 'Successfully Updated');
        }

        $data = DB::table('webinfo')->where('id', 5)->select(['image', 'favicon', 'info_one'])->first();
        $row = json_decode($data->info_one);

        return view('admin.genralsetting', compact('row', 'data'));
    }

    public function aboutus(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'headline' => json_encode(array_filter($request->headline)),
                'titleone' => $request->titleone,
                'titletwo' => $request->titletwo,
                'button_name' => $request->button_name,
                'button_url' => $request->button_url,
                'show_button' => $request->show_button,
                'button_target' => $request->button_target,
                // 'description' => $request->description,
                // 'experience_title' => $request->experience_title,
                // 'lists' => json_encode($request->lists),
                // 'meta_title' => $request->meta_title,
                // 'meta_tags' => $request->meta_tags,
                // 'meta_description' => $request->meta_description,
            ];

            $left = json_encode($request->left);
            $right = json_encode($request->right);


            $new = Info::find(7);
            $new->info_one = json_encode($data);
            $new->aboutlongtext = $request->aboutlongtext;

            

            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(7);

        $row = json_decode($data->info_one);

        return view('admin.about.add', compact('data', 'row'));
        // return view('superadmin.our_mission.about', compact('data','row'));
    }
  
    public function stores(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'headline' => json_encode(array_filter($request->headline)),
                'titleone' => $request->titleone,
            ];
            
            $new = Info::find(31);
            $new->info_one = json_encode($data);
            
            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(31);

        $row = json_decode($data->info_one);

        return view('admin.about.stores', compact('data', 'row'));
        // return view('superadmin.our_mission.about', compact('data','row'));
    }
    
    public function eligibilitybanner(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'titleone' => $request->titleone,
                'buttonName' => $request->buttonName,
                'titletwo' => $request->titletwo,
            ];
            
            $new = Info::find(32);
            $new->info_one = json_encode($data);
            
            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(32);

        $row = json_decode($data->info_one);

        return view('admin.about.eligibilitybanner', compact('data', 'row'));
    }
   
   
    public function entrepreneurship(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'titleone' => $request->titleone,
                'titletwo' => $request->titletwo,
            ];
            
            $new = Info::find(33);
            $new->info_one = json_encode($data);
            
            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(33);

        $row = json_decode($data->info_one);

        return view('admin.about.entrepreneurship', compact('data', 'row'));
    }
   
   
   public function qualityproducts(Request $request)
{
    $info = Info::find(34);

    if ($request->isMethod('post')) {

        // 1. Save title, short, description
        $data = [
            'title' => $request->title,
            // 'short' => $request->short,
            'description' => $request->description,
        ];
        $info->info_one = json_encode($data);

        // 2. Save To-Do Text List
        if ($request->has('todo_titles')) {
            $info->info_two = json_encode($request->todo_titles);
        }

        // 3. Save Images
        $finalImages = [];

        // 3.1 Keep old images (if any)
        if ($request->has('existing_images')) {
            $finalImages = $request->existing_images;
        }

        // 3.2 Upload new images
        if ($request->hasFile('todo_images')) {
            foreach ($request->file('todo_images') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads'), $filename);
                    $finalImages[] = $filename;
                }
            }
        }

        // 3.3 Delete removed images from disk
        $oldImages = json_decode($info->info_three, true) ?? [];
        $deletedImages = array_diff($oldImages, $finalImages);
        foreach ($deletedImages as $imageToDelete) {
            $path = public_path('uploads/' . $imageToDelete);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // 3.4 Save updated image list
        $info->info_three = json_encode($finalImages);

        $info->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    $row = json_decode($info->info_one);
    $todo_titles = json_decode($info->info_two);
    $todo_images = json_decode($info->info_three);

    return view('admin.about.qualityproducts', compact('info', 'row', 'todo_titles', 'todo_images'));
}
  

public function becomeapart(Request $request)
{
    $info = Info::find(35);

    if ($request->isMethod('post')) {

        // 1. Save title, short, description
        $data = [
            'title' => $request->title,
            // 'short' => $request->short,
            'form_title' => $request->form_title,
        ];
        $info->info_one = json_encode($data);

        // 3. Save Images
        $finalImages = [];

        // 3.1 Keep old images (if any)
        if ($request->has('existing_images')) {
            $finalImages = $request->existing_images;
        }

        // 3.2 Upload new images
        if ($request->hasFile('todo_images')) {
            foreach ($request->file('todo_images') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads'), $filename);
                    $finalImages[] = $filename;
                }
            }
        }

        // 3.3 Delete removed images from disk
        $oldImages = json_decode($info->info_three, true) ?? [];
        $deletedImages = array_diff($oldImages, $finalImages);
        foreach ($deletedImages as $imageToDelete) {
            $path = public_path('uploads/' . $imageToDelete);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        // 3.4 Save updated image list
        $info->info_three = json_encode($finalImages);

        $info->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    $row = json_decode($info->info_one);
    $todo_images = json_decode($info->info_three);

    return view('admin.about.becomeapart', compact('info', 'row', 'todo_images'));
}


public function bestSectoion(Request $request)
{
    $info = Info::find(36);

    if ($request->isMethod('post')) {

        // 1. Save title, short, description
        $data = [
            'title' => $request->title,
            'button_name' => $request->button_name,
            'short_description' => $request->short_description,
            'e_title' => $request->e_title,
            'e_short_description' => $request->e_short_description,
        ];
        $info->info_one = json_encode($data);
           if ($request->image) {
                $info->image = updateImage($request->image, $info, 'image');
            }
             if ($request->image_2) {
                $info->image_2 = updateImage($request->image_2, $info, 'image_2');
            }
        $info->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    $row = json_decode($info->info_one);
    
    return view('admin.about.bestSectoion', compact('info', 'row'));
}





public function haicl_strengthening_partners(Request $request)
{
    $info = Info::find(37);

    if ($request->isMethod('post')) {

        // 1. Save title, short, description
        $data = [
            'title' => $request->title,
            'button_name' => $request->button_name,
            'form_title' => $request->form_title,
        ];
        $info->info_one = json_encode($data);
        $info->aboutlongtext = $request->description;

        // 3. Save Images
        $finalImages = [];

        // 3.1 Keep old images (if any)
        if ($request->has('existing_images')) {
            $finalImages = $request->existing_images;
        }

        // 3.2 Upload new images
        if ($request->hasFile('todo_images')) {
            foreach ($request->file('todo_images') as $file) {
                if ($file->isValid()) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('uploads'), $filename);
                    $finalImages[] = $filename;
                }
            }
        }

        // 3.3 Delete removed images from disk
        $oldImages = json_decode($info->info_three, true) ?? [];
        $deletedImages = array_diff($oldImages, $finalImages);
        foreach ($deletedImages as $imageToDelete) {
            $path = public_path('uploads/' . $imageToDelete);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        $info->info_three = json_encode($finalImages);


        // 4. Save Second To-Do Images
$secondImages = [];

// 4.1 Keep old second images (if any)
if ($request->has('existing_second_images')) {
    $secondImages = $request->existing_second_images;
}

// 4.2 Upload new second images
if ($request->hasFile('second_todo_images')) {
    foreach ($request->file('second_todo_images') as $file) {
        if ($file->isValid()) {
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $secondImages[] = $filename;
        }
    }
}

// 4.3 Delete removed second images from disk
$oldSecondImages = json_decode($info->info_two, true) ?? [];
$deletedSecondImages = array_diff($oldSecondImages, $secondImages);
foreach ($deletedSecondImages as $imageToDelete) {
    $path = public_path('uploads/' . $imageToDelete);
    if (file_exists($path)) {
        unlink($path);
    }
}

$info->info_two = json_encode($secondImages);

        $info->save();
        return redirect()->back()->with('success', 'Updated Successfully');
    }

    $second_todo_images = json_decode($info->info_two);
    $row = json_decode($info->info_one);
    $todo_images = json_decode($info->info_three);

    return view('admin.about.haicl_strengthening_partners', compact('info', 'row', 'todo_images','second_todo_images'));
}

    public function infrastructureThinking(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'title' => $request->title,
                'section_layout' => $request->section_layout,
            ];
            $new = Info::find(25);
 $new->info_one = json_encode($data);
            $new->aboutlongtext = $request->long_description;

            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(25);

        $row = json_decode($data->info_one);

        return view('admin.about.infrastructureThinking', compact('data', 'row'));
    }
    
    public function governmentSolutions(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'title' => $request->title,
                'short_description' => $request->short_description,
                'button_name' => $request->button_name,
                'button_url' => $request->button_url,
                'show_button' => $request->show_button,
                'button_target' => $request->button_target,
            ];
            $new = Info::find(26);
            $new->info_one = json_encode($data);
            $new->aboutlongtext = $request->long_description;

            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(26);
        $row = json_decode($data->info_one);
        return view('admin.about.governmentSolutions', compact('data', 'row'));
    }
    
    public function homeabout(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'headline' => $request->headline,
                'experience' => $request->experience,
                'title' => $request->title,
                'description' => $request->description,
                'experience_title' => $request->experience_title,
                'lists' => json_encode($request->lists),
                'meta_title' => $request->meta_title,
                'meta_tags' => $request->meta_tags,
                'meta_description' => $request->meta_description,
            ];

            $left = json_encode($request->left);
            $right = json_encode($request->right);


            $new = Info::find(24);
            $new->info_one = json_encode($data);
            $new->aboutlongtext = $request->aboutlongtext;
            $new->info_two = $left;
            $new->info_three = $right;
            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            if ($request->image_2) {
                $new->image_2 = updateImage($request->image_2, $new, 'image_2');
            }
            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(24);

        $row = json_decode($data->info_one);

        return view('admin.about.homeabout', compact('data', 'row'));
    
    }

    public function privacypolicy(Request $request)
    {
        if ($request->method() == 'POST') {
            $new = Info::find(2);
            $new->info_one = $request->description;
            $new->save();

            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(2);

        return view('admin.pages.privacypolicy', compact('data'));
    }

    public function testimonials(Request $request)
    {
        if ($request->ajax()) {
            $data = Testimonials::query()->latest(); // Assuming a relationship with 'category'

            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('image', function ($row) {
                    return $row->image
                        ? url('uploads/' . $row->image)
                        : url('images/default.png');
                })

                ->addColumn('action', function ($row) {
                    if (isset($row->image)) {
                        $image = $row->image;
                    } else {
                        $image = $row->image;
                    }

                    return '<a href="/admin/delete/testimonials/' . $row->id . '/' . $image . '" onclick="return confirm(\'Are you sure? Delete this.\')" class="btn btn-sm btn-danger">
            <i class="mdi mdi-delete"></i>
        </a>
        <a href="/admin/edit-testimonials/' . $row->id . '"  class="btn btn-sm btn-primary">
           <i class="mdi mdi-file-document-edit-outline"></i>
        </a>';
                })
                ->rawColumns(['image', 'action'])
                ->make(true);
        }

        return view('admin.testimonials.index');
    }

    public function createtestimonials(Request $request)
    {
        if ($request->method() == 'POST') {
            $validatedData = $request->validate([
                'name' => ['required'],
                'image' => ['max:2048'],
            ]);

            $user = new Testimonials;
            $user->name = $request->name;
            $user->destination = $request->destination;
            $user->description = $request->description;
            $user->rating = $request->rating;
            $user->status = $request->status;
            if ($request->image) {
                $user->image = uploadImage($request->image, $user, 'image');
            }
            $user->save();

            return redirect('/admin/testimonials')->with('success', 'Created Successfully');
        }

        return view('admin.testimonials.add');
    }

    public function deletetestimonials($id)
    {
        $testimonial = Testimonials::find($id);
        if ($testimonial->image) {
            $imagePath = public_path('uploads/' . $testimonial->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);  // Delete the image file
            }
        }
        $testimonial->delete();

        return redirect('/admin/testimonials')->with('success', 'Testimonial deleted successfully');
    }

    public function edittestimonials(Request $request, $id)
    {
        $row = Testimonials::find($id);

        if ($request->method() == 'POST') {
            // Validate the form fields
            // $validatedData = $request->validate([
            //     'name' => ['required'],
            //     'destination' => ['required'],
            //     'description' => ['required'],
            //     'status' => ['required'], // Validate that status is set
            //     'image' => ['nullable', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            // ]);

            // Update the fields
            $row->name = $request->name;
            $row->destination = $request->destination;
            $row->description = $request->description;
            $row->rating = $request->rating;
            $row->status = $request->status; // Make sure status is properly updated

            // If a new image is uploaded, handle the image update
            if ($request->image) {
                $row->image = updateImage($request->image, $row, 'image');
            }

            $row->save(); // Save the updated testimonial data

            return redirect('/admin/testimonials')->with('success', 'Updated Successfully');
        }

        // Return the edit form with the current testimonial data
        return view('admin.testimonials.edit', compact('row'));
    }

    // public function aboutus(Request $request)
    // {

    //     $info_one = [
    //         'title' => $request->title,
    //         'subtitle' => $request->subtitle,
    //         'description' => $request->description,
    //     ];
    //     // image 2
    //     // sign... image
    //     // $image = [
    //     //     'title' => $request->title,

    //     // ];
    //     $new = Info::find(7);

    //     $new->info_one = json_encode($info_one);
    //     $new->save();
    //     return view('admin/about.add');
    // }

    // public function faq(Request $request)
    // {

    //     $data = Faq::orderBy('id', 'desc')->get();
    //     return view('superadmin.pages.faq', compact('data'));
    // }

    public function deleterow($table, $id, $image)
    {
        ;
        
        if ($image == 'no_image') {
        } else {
            $image_path = public_path('uploads/' . $image);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $table = DB::table($table)->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Data Successfully Deleted');
    }



    public function awards(Request $request)
    {
        
        if ($request->method() == 'POST') {
            $data = [
                'headline' => $request->headline,
                'title' => $request->title,
                'phone' => $request->phone,
            ];
            //dd($data);
            $new = Info::find(17);
            
            
            
             // Retrieve existing data
        $existingData = json_decode($new->info_two, true);
        $existingLists = isset($existingData['lists']) ? json_decode($existingData['lists'], true) : [];

        // Update main image
        if ($request->hasFile('image')) {
            $image['mainImage'] = $this->updateImage($request->image, null, 'image');
            $existingData['mainImage'] = $image['mainImage'];
        }

        // Handle image removal
        if ($request->has('remove_images')) {
            $removeImages = $request->input('remove_images');
            $existingLists = array_filter($existingLists, function ($item) use ($removeImages) {
                return !in_array($item['image'], $removeImages);
            });
        }
        $newLists = [];
        if ($request->has('image_2')) {
            foreach ($request->file('image_2') as $key => $image_2) {
                $newLists[] = [
                    'image' => $this->updateImage($image_2, null, 'image_2'),
                ];
            }
        }
        $updatedLists = array_merge($existingLists, $newLists);

        $data2 = [
            'lists' => json_encode($updatedLists),
            'mainImage' => $existingData['mainImage'] ?? null,
        ];

        $new->info_two = json_encode($data2);
        
        
        
            $new->info_one = json_encode($data);
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(17);

        $row = json_decode($data->info_one);
        $row2 = json_decode($data->info_two);

        return view('admin.awards', compact('data', 'row','row2'));
        // return view('superadmin.our_mission.about', compact('data','row'));
    }

    public function workingAreas(Request $request)
    {
        if ($request->method() == 'POST') {
            $data = [
                'headline' => $request->headline,
                'title' => $request->title,
                'description' => $request->description,
                'lists' => json_encode($request->lists),
            ];
            $new = Info::find(18);
            $new->info_one = json_encode($data);


            if ($request->image1) {
                $new->image1 = updateImage($request->image1, $new, 'image1');
            }


            if ($request->image2) {
                $new->image2 = updateImage($request->image2, $new, 'image2');
            }

            if ($request->image3) {
                $new->image3 = updateImage($request->image3, $new, 'image3');
            }

            // $image = [];
            // if ($request->has('image1')) {
            //     $image['image1'] = updateImage($request->image1, $new, 'image');
            // }
            // if ($request->has('image2')) {
            //     $image['image2'] = updateImage($request->image2, $new, 'image');
            // }
            // if ($request->has('image3')) {
            //     $image['image3'] = updateImage($request->image3, $new, 'image');
            // }
            // if (!empty($image)) {
            //     $new->image = json_encode($image);
            // }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(18);
        $row = json_decode($data->info_one);
        return view('admin.working_areas', compact('data', 'row'));
    }







    public function have_a_look(Request $request)
    {
        if ($request->method() == 'POST') {
            $request->validate([
                'image' => 'file|mimes:mp4,avi,mov,mkv|max:5120', // max size is in kilobytes (e.g., 10240 KB = 10 MB)
            ]);
            $data = [
                'headline' => $request->headline,
                'title' => $request->title,
                'youtube' => $request->youtube,
                'description' => $request->description
            ];
            //dd($data);
            $new = Info::find(19);
            $new->info_one = json_encode($data);
            if ($request->image) {
                $new->image = updateImage($request->image, $new, 'image');
            }
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(19);

        $row = json_decode($data->info_one);

        return view('admin.have_a_look', compact('data', 'row'));
        // return view('superadmin.our_mission.about', compact('data','row'));
    }

    public function homeimage(Request $request)
{
    if ($request->method() == 'POST') {
        $new = Info::find(20);

        // Retrieve existing data
        $existingData = json_decode($new->info_one, true);
        $existingLists = isset($existingData['lists']) ? json_decode($existingData['lists'], true) : [];
// Update main image
if ($request->hasFile('image')) {
    // Delete old image if exists
    if (!empty($new->image) && file_exists(public_path($new->image))) {
        unlink(public_path($new->image));
    }

    // Upload new image
    $file = $request->file('image');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads'), $filename); // Save to public/uploads folder
    $new->image = 'uploads/' . $filename; // Save the new path in the database
}

        
        // Handle image removal
        if ($request->has('remove_images')) {
            $removeImages = $request->input('remove_images');
            $existingLists = array_filter($existingLists, function ($item) use ($removeImages) {
                return !in_array($item['image'], $removeImages);
            });
        }
        $newLists = [];
        if ($request->has('image_2')) {
            foreach ($request->file('image_2') as $key => $image_2) {
                $newLists[] = [
                    'image' => $this->updateImage($image_2, null, 'image_2'),
                ];
            }
        }
        $updatedLists = array_merge($existingLists, $newLists);

        $data = [
            'lists' => json_encode($updatedLists),
            'mainImage' => $existingData['mainImage'] ?? null,
        ];

        $new->info_one = json_encode($data);
        $new->save();

        return redirect()->back()->with('success', 'Updated Successfully');
    }
    
        // Retrieve data for the view
        $data = Info::find(20);
        $row = json_decode($data->info_one);
        $data = $data->image;
        return view('admin.home_image', compact('data', 'row'));
    }

    public function news(Request $request)
    {
        if ($request->method() == 'POST') {
            $lists = [];
            foreach ($request->title as $key => $title) {
                $lists[] = [
                    'title' => $title,
                    'slug' => $request->slug[$key],
                    'image' => $request->hasFile('image') ? $this->updateImage($request->image[$key], null, 'image') : null, // Handle image upload
                ];
            }
            $data = [
                'headline' => $request->headline,
                'lists' => json_encode($lists),
            ];
            $new = Info::find(21);
            $new->info_one = json_encode($data);
            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(21);
        $row = json_decode($data->info_one);
        return view('admin.newsarticles', compact('data', 'row'));
    }

    public function faq(Request $request)
    {
        if ($request->method() == 'POST') {
            $lists = [];
            foreach ($request->title as $key => $title) {
                $lists[] = [
                    'title' => $title,
                    'dec' => $request->dec[$key],
                ];
            }

            $data = [
                'headline' => $request->headline,
                'lists' => json_encode($lists),
            ];

            $new = Info::find(22);
            $new->info_one = json_encode($data);
            

            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(22);
        $row = json_decode($data->info_one);
        return view('admin.faq', compact('data', 'row'));
    }
    public function scheduleAnIntro(Request $request)
    {
        if ($request->method() == 'POST') {

            $data = [
                'headline' => $request->headline,
                'title' => $request->title,
                'tag_line' => $request->tag_line,
                'description' => $request->description,
                'lists' => json_encode($request->lists)
            ];

            $new = Info::find(23);
            
            
              if ($request->hasFile('image')) {
                $new->image = updateImage($request->file('image'), $new, 'image');
            }
            
            $new->info_one = json_encode($data);
            

            $new->save();
            return redirect()->back()->with('success', 'Updated Successfully');
        }
        $data = Info::find(23);
        $row = json_decode($data->info_one);
        return view('admin.schedule_an_intro', compact('data', 'row'));
    }
    public function updateImage($image, $model, $type)
    {
        if ($image && $image->isValid()) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $path = public_path('uploads/' . $type);

            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }

            $image->move($path, $imageName);
            return 'uploads/' . $type . '/' . $imageName;
        }

        return null;
    }

    public function whoweare(Request $request){
        if($request->method() == "POST"){
            $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'background' => 'nullable|string',
            'strategy' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_tags' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $record = WhoWeAre::first();
        if (!$record) {
            $record = new WhoWeAre();
        }

        $record->fill($validated)->save();

        return response()->json(['status' => true, 'message' => 'Updated successfully']);
        }
         $data = WhoWeAre::first();
         $items = Whoitems::latest()->get();
        return view('admin.about.whoweare' ,  compact('data','items'));
    }

    public function apisdocs(){
        return view('admin.apisdocs');
    }

    public function whowearestore(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required',
        ]);

        Whoitems::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Section created successfully']);
    }

    public function whoweareupdate(Request $request, $id)
    {
        $section = Whoitems::findOrFail($id);

      if($request->method() == "POST"){
          
          
          
            $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $section->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success','Section updated successfully');
      }else{
          return view('admin.about.whoweareupdate',compact('section'));
      }
    }

    public function whowearedestroy($id)
    {
        $section = Whoitems::findOrFail($id);
        $section->delete();

        return redirect()->back()->with('success','Deleted Successfully');
    
    }

   public function careers(Request $request)
{
    if ($request->isMethod('post')) {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'lists' => 'nullable|array',
            'media_type' => 'nullable|string',
            'youtube_link' => 'nullable|string',
            'media_file' => 'nullable|file',
            'page_design' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $career = Career::first(); // We're assuming only one record (id=1)

        // Handle file upload & delete old one
        if ($request->hasFile('media_file')) {
            // Delete old file if exists
            if ($career && !empty($career->media_file)) {
                $oldPath = public_path('uploads/' . $career->media_file);
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }

            // Upload new file
            $file = $request->file('media_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/'), $filename);
            $data['media_file'] = $filename;
        } else {
            // Preserve old file if no new file is uploaded
            if ($career) {
                $data['media_file'] = $career->media_file;
            }
        }

        $data['lists'] = $request->lists ?? [];

        Career::updateOrCreate(['id' => 1], $data);

        return redirect()->back()->with('success', 'Career info saved successfully.');
    }
    
    $career = Career::first();
    return view('admin.careers.index', compact('career'));
}

public function investments(Request $request)
{
    // For simplicity, assume you are editing always the ID = 1
    $investment = Investment::first(); // or ->find(1);

    if ($request->isMethod('post')) {
        $data = $request->validate([
            'title' => 'nullable|string',
            'sub_description' => 'nullable|string',
            'todo_title.*' => 'nullable|string',
            'todo_description.*' => 'nullable|string',
            'meta_title' => 'nullable|string',
            'meta_tags' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        $todoList = [];
        foreach ($request->todo_title as $index => $todoTitle) {
            $todoList[] = [
                'title' => $todoTitle,
                'description' => $request->todo_description[$index] ?? '',
            ];
        }

        if ($investment) {
            $investment->update([
                'title' => $data['title'] ?? "",
                'sub_description' => $data['sub_description'] ?? '',
                'todo_list' => $todoList,
                'meta_title' => $data['meta_title'] ?? '',
                'meta_tags' => $data['meta_tags'] ?? '',
                'meta_description' => $data['meta_description'] ?? '',
            ]);
        } else {
            Investment::create([
                'title' => $data['title'],
                'sub_description' => $data['sub_description'] ?? '',
                'todo_list' => $todoList,
                'meta_title' => $data['meta_title'] ?? '',
                'meta_tags' => $data['meta_tags'] ?? '',
                'meta_description' => $data['meta_description'] ?? '',
            ]);
        }

        return redirect()->back()->with('success', 'Investment saved successfully!');
    }

    return view('admin.investments.index', compact('investment'));
}

public function publications()
{
    return view('admin.publications.index');
}

public function stories() {
    return view('admin.stories.index');
}

public function globalDpiSummit() {
     $dpi = GlobalDpiSummit::with('logos')->first();
    return view('admin.global_dpi_summit.index', compact('dpi'));
}

public function store_globaldpisummit(Request $request)
{
    $request->validate([
        'banner_title' => 'required|string',
        'banner_button_name' => 'nullable|string',
        'banner_image' => 'nullable|image|max:2048',
        'logos.*.name' => 'nullable|string',
        'logos.*.image' => 'nullable|image|max:2048',
        'existing_logos.*.name' => 'nullable|string',
        'existing_logos.*.image' => 'nullable|image|max:2048',
        'content1_title' => 'nullable|string',
        'content1_image' => 'nullable|image|max:2048',
        'image_section' => 'nullable|image|max:2048',
        'content2_title' => 'nullable|string',
        'content2_image' => 'nullable|image|max:2048',
        'dpi_image' => 'nullable|image|max:2048',
        'meta_title' => 'nullable',
        'meta_tags' => 'nullable',
        'meta_description' => 'nullable',
    ]);

    $summit = \App\Models\GlobalDpiSummit::first();
    $data = $request->except(['logos', 'existing_logos', 'delete_logo_ids']);

    // ✅ Upload/update banner/content images
    $imageFields = ['banner_image', 'content1_image', 'image_section', 'content2_image','dpi_image'];
    foreach ($imageFields as $field) {
        if ($request->hasFile($field)) {
            if ($summit && $summit->$field && file_exists(public_path($summit->$field))) {
                unlink(public_path($summit->$field));
            }
            $filename = time() . '_' . $request->file($field)->getClientOriginalName();
            $request->file($field)->move(public_path('uploads'), $filename);
            $data[$field] = 'uploads/' . $filename;
        } elseif ($summit) {
            $data[$field] = $summit->$field;
        }
    }

    if ($summit) {
        $summit->update($data);
    } else {
        $summit = \App\Models\GlobalDpiSummit::create($data);
    }

    // ✅ Handle deleted logos
    if ($request->has('delete_logo_ids')) {
        foreach ($request->delete_logo_ids as $deleteId) {
            $logo = \App\Models\GlobalDpiSummitLogo::find($deleteId);
            if ($logo && file_exists(public_path($logo->logo_image))) {
                unlink(public_path($logo->logo_image));
            }
            $logo?->delete();
        }
    }

    // ✅ Handle updated existing logos
    if ($request->has('existing_logos')) {
        foreach ($request->existing_logos as $id => $logoData) {
            $logo = \App\Models\GlobalDpiSummitLogo::find($id);
            if ($logo) {
                $updateData = ['logo_name' => $logoData['name'] ?? ''];
                if (isset($logoData['image']) && $logoData['image']) {
                    if (file_exists(public_path($logo->logo_image))) {
                        unlink(public_path($logo->logo_image));
                    }
                    $image = $logoData['image'];
                    $filename = time() . '_' . $image->getClientOriginalName();
                    $image->move(public_path('uploads'), $filename);
                    $updateData['logo_image'] = 'uploads/' . $filename;
                }
                $logo->update($updateData);
            }
        }
    }

    // ✅ Handle new logos
    if ($request->has('logos')) {
        foreach ($request->logos as $logo) {
            if (isset($logo['image'])) {
                $image = $logo['image'];
                $filename = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('uploads'), $filename);
                \App\Models\GlobalDpiSummitLogo::create([
                    'summit_id' => $summit->id,
                    'logo_name' => $logo['name'] ?? '',
                    'logo_image' => 'uploads/' . $filename,
                ]);
            }
        }
    }
    return redirect()->back()->with('success', 'Global DPI Summit updated successfully!');
}
public function store_inclusivitypulsefordpi()
{
    $pulse = \App\Models\InclusivityPulse::with(['editors', 'teams'])->first();
    
    // echo "<pre>";
    // print_r($pulse->teams);
    // die;
    
    $teams = \App\Models\Team::where('status', 'Y')->get();
    
    // To get selected team IDs for checkboxes in view
    $selectedTeamIds = $pulse ? $pulse->teams->pluck('id')->toArray() : [];

    return view('admin.inclusivitypulsefordpi.index', compact('pulse', 'teams', 'selectedTeamIds'));
}

public function gds_highlights(Request $request)
{
    $dpi = GlobalDpiSummitHighlight::first();

    if ($request->isMethod('post')) {
        $data = $request->validate([
            'title' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'button_name' => 'nullable|string',
            'button_url' => 'nullable|url',
            'button_target' => 'nullable|string|in:_self,_blank',
            'todos' => 'nullable|array',
            'todos.*.title' => 'nullable|string',
            'todos.*.subtitle' => 'nullable|string',
            'todos.*.youtube_link' => 'nullable|url',
        ]);
        
        if (!empty($data['todos'])) {
    // Reindex todos array to force numeric sequential keys
    $data['todos'] = array_values($data['todos']);
}

        if ($request->hasFile('logo')) {
            if ($dpi && $dpi->logo && file_exists(public_path($dpi->logo))) {
                unlink(public_path($dpi->logo));
            }

            $image = $request->file('logo');
             $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $imageName);
            $data['logo'] = 'uploads/' . $imageName;
        } else {
            if ($dpi) {
                $data['logo'] = $dpi->logo;
            }
        }
        if ($dpi) {
            $dpi->update($data);
        } else {
            $dpi = GlobalDpiSummitHighlight::create($data);
        }

        return back()->with('success', 'GDS Highlights saved successfully!');
    }

    return view('admin.global_dpi_summit.highlights', compact('dpi'));
}

public function dpi_world(Request $request)
{
    
    return view('admin.dpi_world.index');

}
public function countries(Request $request)
{
    
      $countries = Country::latest()->get();
        return view('admin.countries.index', compact('countries'));
        
}
public function country_store(Request $request)
{
    $request->validate([
        'type' => 'required|in:single,group',
        'status' => 'required|in:Y,N',
    ]);

    $data = [
        'type' => $request->type,
        'status' => $request->status,
    ];


    // Single Country
    if ($request->type === 'single') {
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name ?? '', '-');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/countries'), $imageName);
            $data['image'] = 'uploads/countries/' . $imageName;
        }
    }

    // Group Country
    if ($request->type === 'group') {

    
    $request->validate([
        'names' => 'required',
        'images' => 'required|array',
        'images.*' => 'required|image|max:2048',
    ]);

    $data['name'] = $request->names;
    $data['slug'] = Str::slug($request->names ?? '', '-');
    $groupImages = [];
    foreach ($request->file('images') as $image) {
        $imageName = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/countries'), $imageName);
        $groupImages[] = 'uploads/countries/' . $imageName;
    }

    $data['images'] = json_encode($groupImages);
}

    Country::create($data);
    return redirect()->back()->with('success', 'Country added successfully.');
}



public function country_edit($id)
{
    $country = Country::findOrFail($id);
    return view('admin.countries.edit', compact('country'));
}


public function country_update(Request $request, $id)
{
    $country = Country::findOrFail($id);

    $request->validate([
        'status' => 'required|in:Y,N',
    ]);

    $data = ['status' => $request->status , 'type' => $request->type];

    // Single Type Update
    if ($request->type == 'single') {
        $request->validate([
            'name' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data['name'] = $request->name;
        $data['slug'] = Str::slug($request->name ?? '', '-');

        if ($request->hasFile('image')) {
            // Delete old image
            if ($country->image && file_exists(public_path($country->image))) {
                unlink(public_path($country->image));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/countries'), $imageName);
            $data['image'] = 'uploads/countries/' . $imageName;
        }
    }

    // Group Type Update
    if ($request->type == 'group') {
        $request->validate([
            'names' => 'required',
            'images.*' => 'nullable|image|max:2048',
        ]);

        $data['name'] = $request->names;
        $data['slug'] = Str::slug($request->names ?? '', '-');

        if ($request->hasFile('images')) {
            // Delete old images
            $oldImages = json_decode($country->images, true);
            foreach ($oldImages as $img) {
                if ($img && file_exists(public_path($img))) {
                    unlink(public_path($img));
                }
            }

            $groupImages = [];
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . Str::random(6) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/countries'), $imageName);
                $groupImages[] = 'uploads/countries/' . $imageName;
            }

            $data['images'] = json_encode($groupImages);
        }
    }

    $country->update($data);
    return redirect()->route('admin.country.index')->with('success', 'Country updated successfully.');
}


public function country_destroy($id)
{
    $country = Country::findOrFail($id);

    if ($country->type === 'single' && $country->image && File::exists(public_path($country->image))) {
        File::delete(public_path($country->image));
    }

    if ($country->type === 'group') {
        foreach (json_decode($country->images, true) as $img) {
            if (File::exists(public_path($img))) {
                File::delete(public_path($img));
            }
        }
    }

    $country->delete();

    return redirect()->back()->with('success', 'Country deleted successfully.');
}

public function country_cms(Request $request, $id){
     $country = Country::findOrFail($id);
    if ($request->method() == 'POST') {
          $request->validate([
        'description' => 'nullable|string',
        'youtube_iframe' => 'nullable|url',
        'button_name' => 'nullable|string|max:255',
        'button_link' => 'nullable|url',
        'button_target' => 'nullable|in:_self,_blank',
        'layout' => 'required|in:left,right',
    ]);

    $data = [
        'country_id' => $country->id,
        'title' => $request->title,
        'description' => $request->description,
        'youtube_iframe' => $request->youtube_iframe,
        'button_name' => $request->button_name,
        'button_link' => $request->button_link,
        'button_target' => $request->button_target ?? '_self',
        'layout' => $request->layout,
        'meta_description' => $request->meta_description,
        'meta_tags' => $request->meta_tags,
        'meta_title' => $request->meta_title,
    ];

    CountryContent::updateOrCreate(
        ['country_id' => $country->id],
        $data
    );

    return redirect()->back()->with('success', 'Country content updated successfully.');

        return redirect()->back()->with('success', 'CMS content updated successfully.');
    }

    $fetchedContent = CountryContent::where('country_id', $country->id)->first();
    return view('admin.countries.cms', compact('country', 'fetchedContent'));
}

public function highlightcontent(Request $request){
    return view('admin.highlighcontent');
}

public function impact(Request $request)
{
    if ($request->isMethod('post')) {
        $request->validate([
            'title' => 'required|string|max:255',
            'to_do_list' => 'required|array',
            'to_do_list.*.title_1' => 'nullable|string|max:255',
            'to_do_list.*.title_2' => 'nullable|string|max:255',
            'to_do_list.*.title_3' => 'nullable|string|max:255',
        ]);

        $new = Info::find(29) ?? new Info;
        $new->id = 29;
        $new->info_one = $request->title;
        $new->info_two = json_encode($request->to_do_list);
        $new->save();

        return redirect()->back()->with('success', 'Codevelop Impact updated successfully.');
    }

    $row = Info::findOrFail(29);
    return view('admin.impact', compact('row'));
}

public function eventhighlight(Request $request){

      if ($request->isMethod('post')) {
        

      $infoone = [
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'button_name' => $request->button_name,
        'button_url' => $request->button_url,
        'button_target' => $request->button_target,
        'show_button' => $request->show_button,
      ];

        $new = Info::find(30) ?? new Info;
        $new->id = 30;

         if ($request->image_1) {
                $new->image1 = updateImage($request->image_1, $new, 'image1');
            }


            if ($request->image_2) {
                $new->image2 = updateImage($request->image_2, $new, 'image2');
            }

            if ($request->image_3) {
                $new->image3 = updateImage($request->image_3, $new, 'image3');
            }

        $new->info_one = json_encode($infoone);
        $new->info_two = $request->description;
        $new->save();
        return redirect()->back()->with('success', 'Event Highlight updated successfully.');
    }

     $row = Info::find(30);
    return view('admin.eventhighlight',compact('row'));
}

}