<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Controller
{
    public function postRegister(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'age' => 'required|numeric',
            'role' => 'required|in:admin,reader'
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'age' => $request->age,
            'role' => $request->role
        ]);

        return redirect()->route('login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')->with('success', 'You have successfully login');
        } else {
            return redirect()->route('login')->with('error', 'Opps! You have entered invalid credentials');
        }
    }


    public function dashboard()
    {
        return view('dashboard');
    }

    public function inner()
    {
        return view('inner');
    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate(); // Invalidate the session
        session()->regenerateToken(); // Regenerate the CSRF token
        return redirect()->route('login');
    }
}
