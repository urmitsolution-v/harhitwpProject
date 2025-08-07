<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Blogcomments;
use App\Models\Blogmodel;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Info;
use App\Models\Pagesetting;
use App\Models\Project;
use App\Models\Service;
use App\Models\Team;
use App\Models\Work;
use App\Models\Industries;
use App\Models\CaseStudio;
use App\Models\AdminContact;
use App\Models\Subscriber;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriptionMail;

class Commoncontroller extends Controller
{
    // public function termsandconditions($category)
    // {
    //     // $projects = Project::where('category', $category)->get();
    //     return view('front.terms-and-conditions);
    // }
    public function getCategoryProjects($category)
    {
        $projects = Project::where('category', $category)->get();

        return view('project.colbox', compact('projects'));
    }

    public function index()
    {
        $data['banners'] = Banners::where('status', 'Y')->latest()->select(['title', 'description'])->get();
        $data['services'] = Service::where('status', 'Y')->where('featured', 'Y')->take(4)->select(['title', 'slug', 'icon','short_description'])->get();
        
        // echo "<pre>";
        // print_r( $data['services']);
        // die;
        
        $data['abouts'] = Info::find(24);
        $data['aboutInfo'] = json_decode($data['abouts']->info_one);
        $data['aboutLists'] = json_decode($data['aboutInfo']->lists);
        
        // dd($data);
        return view('front.index', $data);
    }

    public function shop()
    {
        return view('front.shop');
    }

    public function partners()
    {
        return view('front.partners');
    }

    public function event()
    {
        return view('front.event');
    }

    public function projects()
    {
        $category = DB::table('category')->where('type', 'project')->where('status', 'Y')->get(['id', 'title']);

        $projects = Project::where('status', 'Y')->get();

        return view('front.projects', compact('projects', 'category'));
    }

    public function teamdetails($slug)
    {

        $teams = Team::where('slug', $slug)->where('status', 'Y')->first();

        // if ($request->method() == "POST") {
        //     $Contact = new Contact();
        //     $Contact->name = $request->name;
        //     $Contact->email = $request->email;
        //     $Contact->phone = $request->phone;
        //     $Contact->code = $request->code;
        //     $Contact->message = $request->message;
        //     $Contact->services = $request->services;
        //     $Contact->save();
        // }
        return view('front.team-details', compact('teams'));
    }

    public function causes()
    {
        return view('front.causes');
    }

    public function about()
    {
        $data['abouts'] = Info::find(7);
        $data['aboutInfo'] = json_decode($data['abouts']->info_one);
        $data['aboutLists'] = json_decode($data['aboutInfo']->lists);
        return view('front.about', $data);
    }


    public function contactus(Request $request)
    {
        if ($request->method() == 'POST') {
            // $validatedData = $request->validate([
            //     'name' => ['required'],
            //     'email' => ['required', 'email'],
            //     'phone' => ['required', 'numeric', 'digits:10'],
            //     'subject' => ['required'],
            //     'message' => ['required'],
            // ]);

            $Contact = new Contact();
            $Contact->name = $request->name;
            $Contact->email = $request->email;
            $Contact->phone = $request->phone;
            $Contact->code = $request->code;
            $Contact->message = $request->message;
            $Contact->services = $request->services;
            $Contact->save();
        }else{
            $getContactDetails = AdminContact::first();
        }

        return view('front.contactus', compact('getContactDetails'))->with('success', 'Your inquiry has been successfully submitted!');
    }

    public function contactsubmitfree(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email'],
        //     'phone' => ['required', 'numeric', 'digits:10'],
        //     'subject' => ['required'],
        //     'message' => ['required'],
        // ]);

        $Contact = new Contact();
        $Contact->name = $request->name;
        $Contact->email = $request->email;
        $Contact->phone = $request->phone;
        $Contact->code = $request->code;
        $Contact->message = $request->message;
        $Contact->services = $request->services;
        $Contact->save();

        return redirect()->back()->with('success', 'Your inquiry has been successfully submitted!');
    }

    public function contactsubmit(Request $request)
    {
        // $validatedData = $request->validate([
        //     'name' => ['required'],
        //     'email' => ['required', 'email'],
        //     'phone' => ['required', 'numeric', 'digits:10'],
        //     'subject' => ['required'],
        //     'message' => ['required'],
        // ]);

        $Contact = new Contact();
        $Contact->name = $request->name;
        $Contact->email = $request->email;
        $Contact->phone = $request->phone;
        $Contact->code = $request->code;
        $Contact->message = $request->message;
        $Contact->services = $request->services;
        $Contact->save();

        return redirect()->back()->with('success', 'Your inquiry has been successfully submitted!');
    }

    public function projectsdetails($slug)
    {
        $relatedProjects = Project::with('get_Categorys')->where('slug', $slug)->where('status', 'Y')->latest()->take(3)->get();
        $project = Project::with('get_Categorys')->where('slug', $slug)->where('status', 'Y')->firstOrFail();
        $category = DB::table('category')->where('type', 'project')->where('status', 'Y')->get(['id', 'title']);

        return view('front.projects-details', compact('project', 'category', 'relatedProjects'));
    }

    public function admission()
    {
        return view('front.admission');
    }

    public function singleblog($slug)
    {
        $aboutus = Info::where('id', 7)->first();
        $row = Blogmodel::with('get_Category')->where('slug', $slug)->where('status', 'Y')->firstOrFail();

        $comment = Comment::get();

        $category = DB::table('category')->where('type', 'blogs')->where('status', 'Y')->get(['id', 'title']);

        return view('front.singleblog', compact('row', 'category'));
    }

    public function comment(Request $request)
    {
        if ($request->post()) {
            $comment = new Comment;
            $comment->name = $request->name;
            $comment->email = $request->email;
            $comment->url = $request->url;
            $comment->comment = $request->comment;
            $comment->save();
        }

        return redirect()->back();
    }

    public function blog()
    {
        if (isset($_GET['blogtype']) && ! empty($_GET['blogtype'])) {
            $blog = Blogmodel::with('get_Category')
                ->where('status', 'Y')
                ->latest()
                ->where('category', $_GET['blogtype'])
                ->get();
        } else {
            $blog = Blogmodel::with('get_Category')
                ->where('status', 'Y')
                ->latest()
                ->select(['title', 'slug', 'image', 'created_at'])
                ->paginate(10);
        }

        $category = DB::table('category')->where('type', 'blogs')->where('status', 'Y')->get(['id', 'title']);
        $category = $category->map(function ($cat) {
            $cat->post_count = Blogmodel::where('category', $cat->id)->where('status', 'Y')->count();

            return $cat;
        });

        // $category = DB::table('category')->where('type', 'blogs')->where('status', 'Y')->get(['id', 'title']);
        return view('front.blog', compact('blog', 'category'));
    }

    // public function blogsingle($slug,Request $request){
    //     $row = Blogmodel::where('slug',$slug)->first();
    //     if ($row) {

    //     $recentblogs = Blogmodel::where('status','Y')->orderBy('id','desc')->take(3)->select(['title','slug','short_description','banner','created_at'])->get();

    //         $comments = Blogcomments::where('blog_id',$row->id)->get();

    //         if ($request->method() == "POST") {
    //             $validatedData = $request->validate([
    //                 'name' => ['required'],
    //                 'email' => ['required','email'],
    //                 'message' => ['required'],
    //             ]);
    //             $comments = new Blogcomments;
    //             $comments->name = $request->name;
    //             $comments->blog_id = $row->id;
    //             $comments->email = $request->email;
    //             $comments->message = $request->message;
    //             $comments->save();
    //             return redirect()->back()->with('success','Comment on this post has been successful');
    //         }

    //     return view('front.blogsingle',compact('row','comments','recentblogs'));
    //     }else{
    //         abort(404);
    //     }
    // }

    public function events()
    {
        return view('front.events');
    }

    public function courses()
    {
        return view('front.courses');
    }

    public function coursesdetails()
    {
        return view('front.coursesdetails');
    }

    public function testimonials()
    {
        return view('front.testimonials');
    }

    public function volunteer()
    {
        return view('front.volunteer');
    }

    public function error()
    {
        return view('front.error');
    }

    // public function services()
    // {
    //     $service = Service::where('status', 'Y')->get();
    //     return view('services', compact('service'));
    // }

    public function servicesdetails($slug)
    {
        $data['category'] = DB::table('category')->where('type', 'service')->where('status', 'Y')->get(['id', 'title']);
        $data['row'] = Service::with('get_Category')->where('slug', $slug)->where('status', 'Y')->firstOrFail();

        return view('front.services-details', $data);
    }

    public function industries()
    {
        $industries = Industries::get();
        return view('front.industries', compact('industries'));
    }

    public function case_studie()
    {
        
        $categories = Category::where('type', 'case_studio')
            ->with('caseStudios')
            ->get();
            //dd($categories);
            return view('front.case_studie', compact('categories'));
    }

    public function ourteam()
    {
        $team = Team::where('status', 'Y')->get();
        return view('front.ourteam',compact('team'));
    }

    public function services()
    {

        if (isset($_GET['category']) && ! empty($_GET['category'])) {
            $service = Service::with('get_Category')
                ->where('status', 'Y')
                ->where('category', $_GET['category'])
                ->latest()
                ->select(['title', 'slug', 'icon'])
                ->get();
        } else {
            $service = service::with('get_Category')
                ->where('status', 'Y')
                ->latest()
                ->select(['title', 'slug', 'icon'])->get();

        }
        $Pagesetting = Pagesetting::where('id', 3)->first();
        $category = DB::table('category')->where('type', 'service')->where('status', 'Y')->get(['id', 'title']);

        return view('front.services', compact('service', 'category', 'Pagesetting'));
    }

    public function faq()
    {
        // $data = Faq::where('status', 'Y')->orderBy('id', 'desc')->get();
        $Faq = Faq::where('status', 'Y')->get();
        return view('front.faq', compact('Faq'));
    }

    public function privacypolicy()
    {
        return view('front.privacy-policy');
    }

    public function termsandconditions()
    {

        return view('front.terms-and-conditions');
    }

    public function teams()
    {
        $team = Team::where('status', 'Y')->orderBy('id', 'desc')->get();

        return view('front.teams', compact('team'));
    }

    public function partner()
    {
        return view('front.partner');
    }

    public function industryDetails($slug)
    {
        $row = Industries::where('slug',$slug)->firstOrFail();
        return view('front.industry-details', compact('row'));
    }

    public function caseStudyDetails($slug)
    {
        $row = CaseStudio::where('slug',$slug)->firstOrFail();
        return view('front.industry-details', compact('row'));
    }

    public function contactForm(Request $request){
        if ($request->method() == 'POST') {


            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
            ]);
        
            
            $contact = new Contact;
            $contact->name = $request->name;
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->subject = $request->subject;
            //$contact->captcha = $request->captcha;
            $contact->message = $request->message;
            //dd($contact);
            $contact->save();


            $data = [
                'name'    => $request->name,
                'email'   => $request->email,
                'phone'   => $request->phone,
                'subject' => $request->subject,
                'message' => $request->message,
            ];
        
            Mail::html("
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; color: #333; }
                    .container { padding: 20px; border: 1px solid #ddd; background: #f9f9f9; }
                    .header { font-size: 20px; font-weight: bold; color: #007BFF; }
                    .info { margin: 10px 0; font-size: 16px; }
                    .message { font-size: 14px; color: #555; padding: 10px; background: #fff; border-radius: 5px; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>New Contact Message</div>
                    <div class='info'><strong>Name:</strong> {$data['name']}</div>
                    <div class='info'><strong>Email:</strong> {$data['email']}</div>
                    <div class='info'><strong>Phone:</strong> {$data['phone']}</div>
                    <div class='info'><strong>Subject:</strong> {$data['subject']}</div>
                    <div class='message'>{$data['message']}</div>
                </div>
            </body>
            </html>
        ", function ($mail) use ($data) {
            $mail->to('rr8637217@gmail.com')
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                ->subject($data['subject']);
        });
        

            return redirect()->back()->with('success', 'Your Enquired Recevied. Our team will contact you soon.');
        }
    }

    public function subscriptionForm(Request $request){
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $subscriber = [
            'email' => $request->email,
        ];

        if (!empty($subscriber['email'])) {
            
            Mail::to($subscriber['email'])->send(new SubscriptionMail($subscriber));
            return back()->with('success', 'Thank you for subscribing!');
        } else {
            return back()->with('error', 'Unable to send email: recipient address is missing.');
        }
    }
}