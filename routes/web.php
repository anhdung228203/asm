<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\client\BlogController;
use App\Http\Controllers\client\HomeController;
use App\Http\Controllers\TagController;
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

Route::prefix('admin')
    ->as('admin.')
    // ->middleware('auth')

    ->group(function () {

        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::prefix('categories')
            ->as('categories.')
            ->controller(CategoryController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('show/{id}', 'show')->name('show');
                Route::get('{id}/edit', 'edit')->name('edit');
                Route::put('{id}/update', 'update')->name('update');
                Route::get('{id}/destroy', 'destroy')->name('destroy');
            });

        Route::prefix('tags')
            ->as('tags.')
            ->controller(TagController::class)
            ->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::get('show/{id}', 'show')->name('show');
                Route::get('{id}/edit', 'edit')->name('edit');
                Route::put('{id}/update', 'update')->name('update');
                Route::get('{id}/destroy', 'destroy')->name('destroy');
            });
    });
