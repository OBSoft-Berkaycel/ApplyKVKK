<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/dashboard');
})->name('home');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::controller(PdfController::class)->group(function(){
        Route::get('pdf-list','show')->name('pdf.list');
    });
    
    Route::controller(FormController::class)->group(function(){
        Route::get('create-form','create')->name('form.create');
        Route::post('create-form','store')->name('form.create');
    });
    
    Route::controller(UserController::class)->group(function(){
    
        Route::get('create-user','index')->name('user.create');
        Route::post('create-user','store')->name('user.create');
        Route::get('myprofile','show')->name('user.show');
    });
});

Route::get("custom-login",function(){
    return view('auth.custom-login');
});

require __DIR__.'/auth.php';
