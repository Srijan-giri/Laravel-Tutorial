<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Rules\UpperCase;

class UserController
{
    public function showUserForm(){
        return view('AddUser');
    }

    public function showStudentForm(){
        return view('show-student');
    }

    public function storeUser(UserRequest $request){

        // $request->validate([
        //     'username'=>'required',
        //     'useremail' => 'required|email',
        //     'userpass' => 'required|alpha_num|min:6',
        //     'userage' => 'required|numeric| min:18',  // min:18 , between :18,30
        //     'usercity' => 'required'
        // ],[
        //     'username.required'=>'User Name is required!',
        //     'useremail.required'=>'User Email is required!',
        //     'userpass.required'=>'User Password is required!',
        //     'userage.required'=>'User Age is required!',
        //     'usercity.required'=>'User City is required!',
        //     'userage.numeric' =>'User age must be numeric!',
        //     'userage.min'=>'User age should not less than 18 years old!',
        //     'userpass.alpha_num'=>'User password must be alpha numeric!',
        //     'userpass.min'=>'User password must be at least 6 characters long!',
        // ]);

        // return $request->all();
        // return $request->only(['username','useremail']);
        return $request->except(['username','useremail']);
    }


    public function addStudent(Request $request){
        $request->validate([
            'username' => ['required',new UpperCase],
            'useremail' => 'required|email|unique'
        ]);
        return $request->all();
    }



}
