<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
        Route::get('form-list','show')->name('form.list');
        Route::post('download-pdf/{form}','downloadPdf')->name('download.pdf');
    });
    
    Route::controller(FormController::class)->group(function(){
        Route::get('create-form','create')->name('form.create');
        Route::post('create-form','store')->name('form.create');
        Route::post('save-form','saveUserForm')->name('form.save');
    });
    
    Route::controller(UserController::class)->group(function(){
        Route::get('create-user','index')->name('user.create');
        Route::post('create-user','store')->name('user.create');
        Route::get('myprofile','show')->name('user.update');
        Route::post('myprofile','update')->name('user.update');
    });
});

require __DIR__.'/auth.php';
