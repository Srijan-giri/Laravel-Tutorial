<?php

use App\Http\Middleware\TestUser;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


Route::view('reader', 'reader')->name('reader');


Route::view('register', 'register')->name('register');
Route::post('register', [Controller::class, 'postRegister'])->name('register');


Route::view('login', 'login')->name('login');
Route::post('login', [Controller::class, 'postLogin'])->name('login');


Route::get('logout', [Controller::class, 'logout'])->name('logout');


Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard')->middleware('auth', 'isValidUser:admin,reader');
Route::get('/dashboard/inner', [Controller::class, 'inner'])->name('inner')->middleware(['auth', 'isValidUser:admin', TestUser::class]);


//!  middleware group
//* with withoutMiddleware() use

// Route::middleware(['isValidUser', TestUser::class])->group(function () {
/**  Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard')->withoutMiddleware(TestUser::class);*/
//     Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
//     Route::get('/dashboard/inner', [Controller::class, 'inner'])->name('inner');
// });


//! with middleware group assigned in app.php

// Route::middleware(['ok-user'])->group(
//     function () {
//         Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
//         Route::get('/dashboard/inner', [Controller::class, 'inner'])->name('inner');
//     }
// );


//! withOut middleware group

Route::withoutMiddleware(TestUser::class)->group(function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
});


//! Middleware Priority
//! Middleware Grouping =>  web , api
