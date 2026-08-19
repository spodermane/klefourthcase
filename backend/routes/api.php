<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;



Route::post('/register',[AuthController::class, 'register']);
Route::post('login',[AuthController::class,'login']);
Route::get('/categories',[CategoryController::class,'index']);
Route::get('/categories/{slug}',[CategoryController::class,'show']);
Route::get('/posts',[PostController::class,'index']);
Route::get('posts/{slug}',[PostController::class,'show']);
Route::get('/posts/{postId}/comments',[CommentController::class,'index']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout',[AuthController::class,'logout']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::post('/comments', [CommentController::class, 'store']);
    Route::get('/user',function (Request $request){
        return $request->user();
    });
    Route::put('/user',[UserController::class,'update']);
});