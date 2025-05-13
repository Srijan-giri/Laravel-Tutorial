<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// })->middleware('check1');


//! group middleware used in route

Route::view('about', 'about')->middleware('check1');
Route::view('contact', 'contact')->middleware('check1');


//! set check1 middleware in every route of the group

// Route::middleware('check1')->group(function () {
//     Route::view('contact', 'contact');
//     Route::view('list', 'contact');
//     Route::view('home', 'welcome');
//     Route::view('about', 'about');
// });
