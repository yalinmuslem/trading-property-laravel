<?php

use App\Http\Controllers\PropertyController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/property', [PropertyController::class, 'show']);
Route::post('/property', [PropertyController::class, 'store']);
Route::get('/public-api/property', [PropertyController::class, 'getCombinePropertyWithUsers']);
