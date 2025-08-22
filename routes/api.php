<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Auth Routes
Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

// Bublic Routes
Route::get('/tasks-all',[TaskController::class,'index']);
Route::get('/tasks/{id}', [TaskController::class,'show']);
Route::get('/tasks-user/{id}', [TaskController::class,'usersTasks']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout',[AuthController::class,'logout']);
    Route::get('/user',[AuthController::class,'user']);

    //CRUD for tasks
    Route::post('/tasks', [TaskController::class,'store']);
    Route::patch('/tasks/{id}', [TaskController::class,'update']);
    Route::delete('/tasks/{id}', [TaskController::class,'destroy']);
});