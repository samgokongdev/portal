<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\DaftarfppController;
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
Route::get('jt',[TunggakanController::class, 'jt'])->name('tunggakan.jt')->middleware('auth');
Route::get('np2belumterbit',[TunggakanController::class, 'np2belumterbit'])->name('tunggakan.np2belumterbit')->middleware('auth');

Route::resource('daftarfpp', DaftarfppController::class)->middleware('auth');

Route::resource('login', LoginController::class)->middleware('guest');
Route::resource('register', RegisterController::class)->middleware('guest');
// Route::get('login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('login',[LoginController::class, 'store'])->name('login.store')->middleware('guest');
Route::post('logout',[LoginController::class, 'logout'])->name('login.logout')->middleware('auth');
// Route::get('/',[LoginController::class, 'index'])->name('login.index')->middleware('guest');
// Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
