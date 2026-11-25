<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function (){
    Route::resource('owners', OwnerController::class)->except('show');
});
