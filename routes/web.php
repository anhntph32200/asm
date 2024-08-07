<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthenController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\IsUser;
use App\Http\Middleware\IsAdmin;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// User
Route::middleware(['auth', 'IsUser'])->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('/contact', function () {
        return view('user.contact');
    })->name('user.contact');
    Route::get('/user/detail/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/category/{categoryId}', [UserController::class, 'category'])->name('user.category');
    Route::get('/search', [UserController::class, 'search'])->name('user.search');
});

// Admin
Route::middleware(['auth', 'IsAdmin'])->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('news', NewsController::class);
    Route::resource('categories', CategoryController::class);
});

// Auth
Route::get('login', [AuthenController::class, 'showFormLogin'])->name('login');
Route::post('login', [AuthenController::class, 'handleLogin']);
Route::get('register', [AuthenController::class, 'showFormRegister'])->name('register');
Route::post('register', [AuthenController::class, 'handleRegister']);
Route::post('logout', [AuthenController::class, 'logout'])->name('logout');