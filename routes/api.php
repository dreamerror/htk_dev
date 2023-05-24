<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/edit-content', [App\Http\Controllers\Api\PageContentController::class, 'editContent']);

Route::group(['prefix' => 'admin'], function () {
    Route::post('/background', [App\Http\Controllers\Api\AdminApiController::class, 'editBackground']);
    Route::post('/document', [App\Http\Controllers\Api\AdminApiController::class, 'editDocument']);
    Route::post('/contacts', [App\Http\Controllers\Api\AdminApiController::class, 'editContacts']);
    Route::post('/files', [App\Http\Controllers\Api\AdminApiController::class, 'editFiles']);
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Auth\LoginController::class, 'register']);
});
