<?php

use App\Http\Controllers\UserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/all-users', [UserController::class, 'index']);

// Route redirect
Route::redirect('/users', '/all-users', 301);




// here we can use slug instead of direct passing id
// Route::get('/users/{user:slug}/export', [UserController::class, 'show']);



// using getRouteKeyName function
Route::get('/users/{user}/export', [UserController::class, 'show'])
    ->missing(function (Request $request) {
        return Redirect::route('not-found');
    });


Route::view('/not-found', 'not_found')->name('not-found');


Route::fallback(function () {
    return ' <h1 style="display:flex;justify-content:center;align-items:center;height:100vh">404 | Page Not Found</h1>';
});
