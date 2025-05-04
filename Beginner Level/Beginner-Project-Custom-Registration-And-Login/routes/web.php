<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function(){
    // Route::view('/','Welcome')->name('home');
    Route::get('/', [AuthController::class,'index'])->name('home');
});


Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/login',[AuthController::class,'loginPost'])->name('login.post');

Route::get('/register',[AuthController::class,'register'])->name('register.get');
Route::post('/register',[AuthController::class,'registerPost'])->name('register.post');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
Route::get('/profile',[AuthController::class,'profile'])->name('profile');


Route::get('/forgot-password',[AuthController::class,'forgotPassword'])->name('forgot-password');

Route::fallback(function(){
    return "<h1 style='display:flex;justify-content:center;align-items:center;height:100vh;margin:0px'>404 | Not Found</h1>";
});
