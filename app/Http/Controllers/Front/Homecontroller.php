<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Info;

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
        return view('website.home',$data);
    }

    public function about(){
     return view('website.about');
    }
    
    public function key_benefits(){
     return view('website.key_benefits');
    }
 
    public function training_material(){
     return view('website.training_material');
    }
 
 
    public function partner_withus(){
     return view('website.partner_withus');
    }
 
 
    public function product_catalogue(){
     return view('website.product_catalogue');
    }
 
 
    public function franchise_registration(){
     return view('website.franchise_registration');
    }
  
 
    public function locatestore(){
     return view('website.locatestore');
    }
  
    public function discounts(){
     return view('website.commingsoon');
    }
    public function harhithnews(){
     return view('website.harhithnews');
    }
 
    public function contactus(){
     return view('website.contactus');
    }
  
 
    public function store_fitmentcatalogue(){
     return view('website.store_fitmentcatalogue');
    }
  
    public function login(){
     return view('website.login');
    }

}