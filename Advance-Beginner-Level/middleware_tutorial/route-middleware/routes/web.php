<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AgeCheck;
use App\Http\Middleware\CountryCheck;

Route::get('/', function () {
    return view('welcome');
})->middleware(AgeCheck::class);


//! route Middleware
//* it is not have to assign in app.php file

Route::view('about', 'about')->middleware([AgeCheck::class, CountryCheck::class]);
Route::view('contact', 'contact')->middleware(CountryCheck::class);;
