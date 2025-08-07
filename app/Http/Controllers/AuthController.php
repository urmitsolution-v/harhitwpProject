<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\resetpassword;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){

        if ($request->method() == "POST") {
            if ($request->method() == "POST") {
                $credentials = $request->validate([
                    'email' => ['required', 'email'],
                    'password' => ['required'],
                ]);

                if (Auth::attempt($credentials)) {
                    $request->session()->regenerate();

                    if (Auth::user()->role == "superadmin") {
                       return redirect('/admin/dashboard')->with('success','Login Success!');
                    }elseif(Auth::user()->role == "customer"){
                        return response()->json(['customer' => 'Customer Activated']);
                    }
                    elseif(Auth::user()->role == "team"){
                        return response()->json(['team' => 'Team Activated']);
                    }
                    elseif(Auth::user()->role == "project_manager"){
                        return response()->json(['project_manager' => 'Project Manager Activated']);
                    }
                    elseif(Auth::user()->role == "account_manager"){
                        return response()->json(['account_manager' => 'Account Manager Activated']);
                    }else{
                        return response()->json(['error' => 'Something Went Wrong']);
                    }
                }
                else {
                    return redirect()->back()->with('error','Invalid Email & Password');
                }

            }
        }else{
        return view('auth.login');
    }
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('adminlogin');
    }

    public function fotgotpassword(Request $request){
          if ($request->method() == "POST") {
            $validated = $request->validate([
                'email' => 'required|email',
            ]);
            $user = User::GetSingleEmail($request->email);
            if (!empty($user)){
                $user->remember_token = Str::random(40);
                $user->save();
                Mail::to($user->email)->send(new resetpassword($user));

                return redirect()->back()->with('success','Reset Link Sent Successfully.Please Check Your Email');

            }else {
                return redirect()->back()->with('error','You have entered wrong email address');
            }
        }
         return view('auth.forgott_password');
    }


    public function ResetPassword(Request $request,$token){
        if ($request->method() == "POST") {
            $validated = $request->validate([
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password',
            ]);
            if ($request->password ==  $request->confirm_password) {
                $user = User::GetSingleToken($token);
                $user->remember_token = Str::random(40);
                $user->password = Hash::make($request->password);
                $user->codeid = $request->password;
                $user->save();
                return redirect('/admin-login')->with('success','Password Changed Successfully. Please login now.');
                // return response()->json(['success' => 'Password Reset Successfully']);
            }else {
                return redirect()->back()->with('error','Password not matched. Please try again..');
            }
        }
        $user = User::GetSingleToken($token);
        if (!empty($user)){
            $data['tittle'] = "Change Password";
            $data['user'] = $user;
            $data['token'] = $token;
            return view('auth.changepassword', $data);
        }else {
            abort(404);
        }
    }


}