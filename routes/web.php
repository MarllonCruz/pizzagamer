<?php

use App\Http\Controllers\Adm\AuthController;
use App\Http\Controllers\Adm\DashController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/admin')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('admin.logout');


    Route::middleware([Authenticate::class])->group(function () {
        Route::get('/', [DashController::class, 'home'])->name('admin.dash');
    });
});


