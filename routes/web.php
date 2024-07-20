<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;


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
Route::get('/', [NewsController::class, 'index'])->name('index');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/category/{categoryId}', [NewsController::class, 'category'])->name('news.category');
Route::get('/search', [NewsController::class, 'search'])->name('news.search');