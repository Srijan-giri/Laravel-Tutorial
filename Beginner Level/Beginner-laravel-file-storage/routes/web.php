<?php

use App\Http\Controllers\StorageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('file', StorageController::class);
