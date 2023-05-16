<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\PublicController::class, 'index']);
Route::get('/temp-storage', [App\Http\Controllers\PublicController::class, 'tempStorage']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
