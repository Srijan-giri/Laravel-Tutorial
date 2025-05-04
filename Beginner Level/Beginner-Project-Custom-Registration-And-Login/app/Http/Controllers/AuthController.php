<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function index(){
        $user = Auth::user();
        if ($user){
            return view('Welcome',['user' => $user]);
        }
        else{
            return redirect()->route('login')->with('error','Please Login');
            // return view('welcome');
        }
    }
    public function login(){
        return view('auth.login');
    }

    public function loginPost(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:5',
        ]);

        // here selecting only email and password
        $credentials = $request->only('email','password');

        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'))
                            ->with('success','Login Successfully');
        }

        return redirect()->route('login.get')
                            ->with('error','Invalid Credentials');
    }


    public function register(){
        return view('auth.registration');
    }

    public function registerPost(Request $request){
        $request->validate([
             'fullname'=>'required|string|max:255',
             'email' => 'required|email|unique:users,email',
             'password' => 'required|string|min:5',
        ]);

        $user = new User();
        $user->name = $request->fullname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($user->save()){
            return redirect()->route('login.get')
                             ->with('success','User Created Successfully');
        }

        return redirect()->route('register.get')
                         ->with('error','Failed to create account');
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect()->route('login');
    }


    public function profile(){
        if(Auth::check()){
            $user = Auth::user();
            return view('pages.profile', ['user' => $user]);
        }
        else{
            return redirect()->route('login')->with('error','Failed to login');
        }
    }

    public function forgotPassword(){
        return view('auth.forgot-password');
    }


    public function forgotPasswordSendMail(Request $request){
            $request->validate([
                'email' =>'required|email',
            ]);

            $user = User::where('email',$request->email)->first();

            if($user){
                $email = $user->email;
            }
            return redirect()->route('')->with('error','Email not found');
    }

    // public function forgotPasswordPost(Request $request){
    //     $request->validate([
    //         'password' => 'required|string|min:5'
    //     ]);

    //     $user = $request->user();
    // }

}
