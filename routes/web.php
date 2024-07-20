<?php

use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('post/{id}', [BlogController::class, 'detailPost'])->name('home.post');
Route::get('/category/{id}', [BlogController::class, 'blogListByDanhMucID'])->name('category');
Route::post('search', [HomeController::class, 'searchHome'])->name('search');

