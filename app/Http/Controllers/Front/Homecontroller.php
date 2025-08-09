<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Info;
use App\Models\Insights;
use App\Models\Publication;
use App\Models\Contact;
use App\Models\User;
use App\Models\UserData;
use App\Models\Investment;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
class Homecontroller extends Controller
{

    public function index(){
        $data['banners'] = Banners::where('status','Y')->select('title','image')->get();
        $data['aboutdata'] = Info::find(7);
        $data['aboutrow'] = json_decode($data['aboutdata']->info_one);
         $data['store'] = Info::find(31);
        $data['storerow'] = json_decode($data['store']->info_one);
         $data['eligibility'] = Info::find(32);
        $data['eligibilityrow'] = json_decode($data['eligibility']->info_one);
         $data['entrepreneurship'] = Info::find(33);
        $data['entrepreneurship_row'] = json_decode($data['entrepreneurship']->info_one);
        $data['entrepreneurship_lists'] = Insights::where('status','Y')->select('image','short_description','title')->get();
     
        $data['qualityproducts'] = Info::find(34);
        $data['quality_row'] = json_decode($data['qualityproducts']->info_one);
        $data['quality_todos'] = json_decode($data['qualityproducts']->info_two);
        $data['quality_images'] = json_decode($data['qualityproducts']->info_three);
    

        $data['become'] = Info::find(35);
        $data['become_row'] = json_decode($data['become']->info_one);
        $data['become_images'] = json_decode($data['become']->info_three);
        
        $data['best'] = Info::find(36);
        $data['best_row'] = json_decode($data['best']->info_one);

        $data['partners'] = Info::find(37); 
        $data['partners_best_row'] = json_decode($data['partners']->info_one);
        $data['partners_todo_images'] = json_decode($data['partners']->info_three ?? '[]');
        $data['second_todo_images'] = json_decode($data['partners']->info_two ?? '[]');
        
    return view('website.home',$data);
    }

    public function about(){
     return view('website.about');
    }
    
    public function key_benefits(){
     return view('website.key_benefits');
    }
 
    public function training_material(){
    $dd = Investment::firstorfail();
        $data['video_tranning'] = $dd->todo_list;
        
     return view('website.training_material',$data);
    }
 
 
    public function partner_withus(){
     return view('website.partner_withus');
    }
 
 
    public function product_catalogue(){
     return view('website.product_catalogue');
    }
 
 
public function franchise_registration(Request $request)
{
    if ($request->isMethod('post')) {

        $validated = $request->validate([
            'name'     => ['required', 'regex:/^[a-zA-Z\s]+$/', 'min:2', 'max:25'],
            'mobile'   => ['required', 'digits:10', 'regex:/^[6-9]\d{9}$/','unique:users,phone'],
            'email'    => ['required', 'email','unique:users,email'],
            'district' => ['required']
        ]);

        $otp = rand(1000, 9999);

        session([
            'franchise_registration_data' => [
                'name'     => $validated['name'],
                'mobile'   => $validated['mobile'],
                'email'    => $validated['email'],
                'district' => $validated['district'],
            ],
            'otp' => $otp,
            'success_message' => 'Registration successful! Your OTP is ' . $otp
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'Registration successful! Redirecting to OTP page...',
            'redirect_url' => route('otp.page')
        ]);
    }

    return view('website.franchise_registration');
}

public function otp_page()
{
    $otp = session('otp');
    return view('website.otp_page', compact('otp'));
}
  


    public function verifyOtp(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'otp' => 'required|digits:4',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        $enteredOtp = $request->input('otp');

        if ($enteredOtp == Session::get('otp')) {
    
            $franchiseData = Session::get('franchise_registration_data');

    $user = User::create([
        'name'   => $franchiseData['name'],
        'phone' => $franchiseData['mobile'],
        'email'  => $franchiseData['email'],
        'role'  => 'user',
        'is_verify'  => 'N',
    ]);

    UserData::create([
        'user_id'  => $user->id,
        'district_name' => $franchiseData['district'],
    ]);

    Session::forget(['otp','franchise_registration_data']);
            return response()->json([
                'status'       => 'success',
                'message'      => 'OTP verified successfully!',
                'redirect_url' => '/login' 
            ]);
        }

        return response()->json([
            'status'  => 'error',
            'message' => 'Invalid OTP. Please try again.'
        ]);
    }
 
    public function locatestore(){
     return view('website.locatestore');
    }
  
    public function discounts(){
     return view('website.commingsoon');
    }
    public function harhithnews(){
        $data['news'] = Publication::select('image')->latest()->get();
     return view('website.harhithnews',$data);
    }
 
    public function contactus(Request $request){
        if($request->method() == "POST"){
            

            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
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
     return view('website.contactus');
    }
  
 
    public function store_fitmentcatalogue(){
     return view('website.store_fitmentcatalogue');
    }
  
    public function login(){
     return view('website.login');
    }



}