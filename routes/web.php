<?php

use App\Http\Controllers\ContentController;
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
Route::get('/admin', [MainController::class,'admin'])->name('admin');
Route::post('/update/{story}', [MainController::class,'update'])->name('update');
Route::delete('/delete/{story}', [MainController::class,'delete'])->name('delete');

Route::get('/', [MainController::class,'index'])->name('index');
Route::get('/create', [MainController::class,'create'])->name('create');
Route::post('/store', [MainController::class,'store'])->name('store');
Route::get('/show/{story}', [MainController::class,'show'])->name('show');










