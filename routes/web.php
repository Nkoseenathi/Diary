<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\UserController;
use App\http\Controllers\PostController;
Route::get('/', function () {
    $post = [];
    if(auth()->check()){
    $post = auth()->user()->userPosts()->latest()->get();}
    return view('home',["posts"=>$post]);
});
 
Route::post('/register', [UserController::class,"register"]);
Route::post('/logout', [UserController::class,"logout"]);
Route::post('/login', [UserController::class,"login"]);
#Post controller routes
Route::post('/create-post', [PostController::class,"createPost"]);
Route::get('/edit-post/{post}', [PostController::class,"showEditScreen"]);
Route::put('/edit-post/{post}', [PostController::class,"updateScreen"]);
Route::delete('/delete-post/{post}', [PostController::class,"deletePost"]);