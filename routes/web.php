<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('pdf-list',[PdfController::class,'show'])->name('pdf.list');
Route::get('create-user',[UserController::class,'index'])->name('user.create');
Route::post('create-user',[UserController::class,'store'])->name('user.create');