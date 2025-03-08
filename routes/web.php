<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\UserDashboard;

Route::get('/', [Dashboard::class, 'dashboard'])->name('dashboard');


Route::get('/admin', [Dashboard::class, 'dashboard'])
    ->middleware('role:admin') // Pass the role parameter
    ->name('admin.dashboard');
;
Route::get('/user', [UserDashboard::class, 'dashboard'])
    ->name('user.dashboard')
    ->middleware('role:user') // Pass the role parameter

;


    

Route::get('/register', [AuthController::class, 'showregister'])->name('showregister');
Route::post('/registering', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');