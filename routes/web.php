<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    $files = File::files(public_path('images')); // Ambil semua file dalam folder public/images
    $images = array_map(fn($file) => 'images/' . $file->getFilename(), $files);

    return view('welcome', compact('images'));
});
