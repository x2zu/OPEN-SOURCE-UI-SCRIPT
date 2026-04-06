<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiswaController;

Route::get('/', [SiswaController::class, 'index']);
Route::post('/aspirasi', [SiswaController::class, 'store']);


Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'auth']);

Route::middleware('admin.auth')->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
    Route::post('/admin/aspirasi/{id}', [AdminController::class, 'update']);
    Route::delete('/admin/aspirasi/{id}', [AdminController::class,'datadelete']);
    Route::get('/admin/logout', [AdminController::class, 'logout']);
});
