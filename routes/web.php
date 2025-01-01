<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/auth', [AuthController::class, 'showLoginForm'])->name('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Защищенный маршрут для админки, доступный только авторизованным пользователям
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

});


Route::post('/update/{id}', [MainController::class,'update'])->name('update');
Route::delete('/delete/{id}', [MainController::class,'delete'])->name('delete');

Route::get('/', [MainController::class,'index'])->name('index');
Route::get('/create', [MainController::class,'create'])->name('create');
Route::post('/store', [MainController::class,'store'])->name('store');
Route::get('/show/{story}', [MainController::class,'show'])->name('show');










