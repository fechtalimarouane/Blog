<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BlogController::class , 'index']);



Route::get('/blog', [BlogController::class , 'blog']);


Route::get('/login', [BlogController::class , 'login']);
Route::get('/logout', [BlogController::class , 'logout']);
Route::post('/login/info', [BlogController::class , 'userlogin']);
Route::get('/inscription', [BlogController::class , 'create']);
Route::post('/inscription/store', [BlogController::class , 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/blog/create', [BlogController::class , 'blogCreate']);
    Route::post('/blog/store', [BlogController::class , 'blogStore']);
    Route::get('/blog/edit/{id}', [BlogController::class , 'blogedit']);
    Route::put('/blog/updete/{id}', [BlogController::class , 'blogupdat']);
    Route::get('/blog/show/{id}', [BlogController::class , 'blogshowe']);
    Route::delete('/blog/delete/{id}', [BlogController::class , 'destroy']);
    Route::get('/blog/myposts', [BlogController::class , 'userblogs']);
});