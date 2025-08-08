<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banners;
use App\Models\Info;
use App\Models\Insights;

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