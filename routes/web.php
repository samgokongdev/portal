<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TunggakanController;
use Illuminate\Support\Facades\Route;

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

Route::resource('home', HomeController::class)->middleware('auth');
Route::resource('tunggakan', TunggakanController::class)->middleware('auth');


Route::resource('login', LoginController::class)->middleware('guest');
Route::resource('register', RegisterController::class)->middleware('guest');
// Route::get('login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('login',[LoginController::class, 'store'])->name('login.store')->middleware('guest');
Route::post('logout',[LoginController::class, 'logout'])->name('login.logout')->middleware('auth');
// Route::get('/',[LoginController::class, 'index'])->name('login.index')->middleware('guest');
// Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
