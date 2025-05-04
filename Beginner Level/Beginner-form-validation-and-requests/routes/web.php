<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::view('/add-user','AddUser');

Route::post('/add-user',[UserController::class,'storeUser'])->name('add-user');

Route::view('/add-student','show-student');

Route::post('/add-student',[UserController::class,'addStudent'])->name('add-student');
