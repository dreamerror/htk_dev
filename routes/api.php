<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/edit-content', [App\Http\Controllers\Api\PageContentController::class, 'editContent']);
Route::post('/edit-files', [App\Http\Controllers\Api\PageContentController::class, 'pagesFiles']);

Route::group(['prefix' => 'info'], function () {
    Route::post('/text', [App\Http\Controllers\Api\PageContentController::class, 'editInfo']);
    Route::post('/files', [App\Http\Controllers\Api\PageContentController::class, 'infoFiles']);
});

Route::group(['prefix' => 'upload'], function () {
    Route::post('/image', [App\Http\Controllers\Api\PageContentController::class, 'saveImage']);
    Route::post('/insert/image', [App\Http\Controllers\Api\PageContentController::class, 'insertImage']);
});

Route::group(['prefix' => 'admin'], function () {
    Route::post('/background', [App\Http\Controllers\Api\AdminApiController::class, 'editBackground']);
    Route::post('/partner', [App\Http\Controllers\Api\AdminApiController::class, 'editPartner']);
    Route::post('/card', [App\Http\Controllers\Api\AdminApiController::class, 'editCards']);
    Route::post('/document', [App\Http\Controllers\Api\AdminApiController::class, 'editDocument']);
    Route::post('/contacts', [App\Http\Controllers\Api\AdminApiController::class, 'editContacts']);
    Route::post('/files', [App\Http\Controllers\Api\AdminApiController::class, 'editFiles']);
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Auth\LoginController::class, 'register']);
});
