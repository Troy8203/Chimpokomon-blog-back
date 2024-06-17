<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/posts', PostController::class);
Route::apiResource('/categories', CategoryController::class);
Route::apiResource('/tags', TagController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
/* Route::group(['prefix' => 'v1', ], function () {
    Route::apiResource('/posts', PostController::class);
    Route::apiResource('/categories', CategoryController::class);
    Route::apiResource('/tags', TagController::class);
}); */