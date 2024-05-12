<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [BlogController::class , 'login']);
Route::get('/inscription', [BlogController::class , 'create']);
Route::post('/inscription/store', [BlogController::class , 'store']);
Route::get('/', [BlogController::class , 'index']);
Route::get('/blog', [BlogController::class , 'blog']);
Route::get('/blog/create', [BlogController::class , 'blogCreate']);
Route::post('/blog/store', [BlogController::class , 'blogStore']);


