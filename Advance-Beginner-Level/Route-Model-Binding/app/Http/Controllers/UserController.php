<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return $users;
    }


    // that is route model binding and here format is :
    // /user/{user}/export  => User $user in Controller
    // parameter and route parameter name should be same

    public function show(User $user)
    {
        return $user;
    }
}
