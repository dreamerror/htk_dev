<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\PublicController::class, 'index']);
Route::get('/temp-storage', [App\Http\Controllers\PublicController::class, 'tempStorage']);
Route::get('/customs', [App\Http\Controllers\PublicController::class, 'customs']);
Route::get('/contacts', [App\Http\Controllers\PublicController::class, 'contacts']);
Route::get('/prices', [App\Http\Controllers\PublicController::class, 'prices']);
Route::get('/partners', [App\Http\Controllers\PublicController::class, 'partners']);
Route::get('/test', [App\Http\Controllers\PublicController::class, 'test']);

Route::group(['middleware' => ['web'], 'prefix' => 'login'], function () {
   Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index']);
    Route::get('/backgrounds', [App\Http\Controllers\AdminController::class, 'backgrounds']);
    Route::get('/cards', [App\Http\Controllers\AdminController::class, 'cards']);
    Route::get('/documents', [App\Http\Controllers\AdminController::class, 'documents']);
    Route::get('/contacts', [App\Http\Controllers\AdminController::class, 'contacts']);
    Route::get('/files', [App\Http\Controllers\AdminController::class, 'files']);
    Route::get('/register', [App\Http\Controllers\Auth\LoginController::class, 'showRegisterForm']);
});

Route::group(['prefix' => 'transportation'], function () {
    Route::get('/', [App\Http\Controllers\PublicController::class, 'transportIndex']);
    Route::get('/cargo', [App\Http\Controllers\PublicController::class, 'cargo']);
    Route::get('/passengers', [App\Http\Controllers\PublicController::class, 'passengers']);
    Route::get('/transit', [App\Http\Controllers\PublicController::class, 'transit']);
});

Route::group(['prefix' => 'info'], function () {
    Route::get('/add', [App\Http\Controllers\SecuredController::class, 'addInfo']);
    Route::get('/', [App\Http\Controllers\PublicController::class, 'infoList']);
    Route::get('/show/{id}', [App\Http\Controllers\PublicController::class, 'infoPage']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
