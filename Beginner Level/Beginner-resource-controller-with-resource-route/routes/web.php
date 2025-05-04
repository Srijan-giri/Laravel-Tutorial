<?php

use App\Http\Controllers\AppoinmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('appoinments',AppoinmentController::class);
