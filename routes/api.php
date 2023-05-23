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
});
