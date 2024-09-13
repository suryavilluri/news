<?php

use Illuminate\Support\Facades\Route;

USE App\Http\Controllers\UserController;
USE App\Http\Controllers\CategoryController;
USE App\Http\Controllers\ContentController;
USE App\Http\Controllers\NewsController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [NewsController::class, 'index']);
Route::get('/cms', [UserController::class, 'index']);

Route::get('login', [UserController::class, 'index'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout']);

Route::group(['prefix' => 'cms', 'middleware' => ['auth']], function() {
    Route::get('dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    Route::get('category', [CategoryController::class, 'index'])->name('category');
    Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('content', [ContentController::class, 'index'])->name('content');
    Route::post('/content/create', [ContentController::class, 'create'])->name('content.create');
});


