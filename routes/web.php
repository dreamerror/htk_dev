<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\PublicController::class, 'index']);
Route::get('/temp-storage', [App\Http\Controllers\PublicController::class, 'tempStorage']);
Route::get('/customs', [App\Http\Controllers\PublicController::class, 'customs']);
Route::get('/contacts', [App\Http\Controllers\PublicController::class, 'contacts']);

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
});

Route::group(['prefix' => 'transportation'], function () {
    Route::get('/cargo', [App\Http\Controllers\PublicController::class, 'cargo']);
    Route::get('/passengers', [App\Http\Controllers\PublicController::class, 'passengers']);
    Route::get('/transit', [App\Http\Controllers\PublicController::class, 'transit']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
