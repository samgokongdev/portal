<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\DaftarfppController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\LhpPemeriksaanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\SkpController;
use App\Http\Controllers\PersuratanPemeriksaanController;
use App\Http\Controllers\PortaluserController;
use App\Http\Controllers\ProfilController;
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

Route::resource('profil', ProfilController::class)->middleware('auth');

Route::resource('file', FileController::class)->middleware('auth');

Route::resource('portaluser', PortaluserController::class)->middleware('auth');

Route::resource('persuratan', PersuratanPemeriksaanController::class)->middleware('auth');
Route::get('buat/{id}',[PersuratanPemeriksaanController::class, 'buat'])->name('persuratan.buat')->middleware('auth');
Route::post('carisurat',[PersuratanPemeriksaanController::class, 'cari'])->name('persuratan.cari')->middleware('auth');

Route::resource('tunggakan', TunggakanController::class)->middleware('auth');
Route::get('jt',[TunggakanController::class, 'jt'])->name('tunggakan.jt')->middleware('auth');
Route::get('np2belumterbit',[TunggakanController::class, 'np2belumterbit'])->name('tunggakan.np2belumterbit')->middleware('auth');
Route::get('rekaptunggakan',[TunggakanController::class, 'rekapTunggakanPerFpp'])->name('tunggakan.rekapTunggakanPerFpp')->middleware('auth');

Route::resource('lhp', LhpPemeriksaanController::class)->middleware('auth');
Route::post('updatedata',[LhpPemeriksaanController::class, 'updatedata'])->name('lhp.updatedata')->middleware('auth');

Route::resource('penerimaan', PenerimaanController::class)->middleware('auth');
Route::get('rekap',[PenerimaanController::class, 'rekap'])->name('penerimaan.rekap')->middleware('auth');
Route::post('rekappenerimaan',[PenerimaanController::class, 'rekappenerimaan'])->name('penerimaan.rekappenerimaan')->middleware('auth');

Route::resource('daftarfpp', DaftarfppController::class)->middleware('auth');
Route::get('rekaplhp',[LhpPemeriksaanController::class, 'rekaplhp'])->name('lhp.rekaplhp')->middleware('auth');
Route::get('rekaplhp/{id}',[LhpPemeriksaanController::class, 'rekaplhptahun'])->name('lhp.rekaplhptahun')->middleware('auth');
Route::get('detailperspv/{id}',[LhpPemeriksaanController::class, 'detailperspv'])->name('lhp.detailperspv')->middleware('auth');
Route::get('detailperpic/{id}',[LhpPemeriksaanController::class, 'detailperpic'])->name('lhp.detailperpic')->middleware('auth');
Route::get('arsiplhp/{id}',[LhpPemeriksaanController::class, 'arsiplhp'])->name('lhp.arsiplhp')->middleware('auth');
Route::get('permohonan',[LhpPemeriksaanController::class, 'permohonan'])->name('lhp.permohonan')->middleware('auth');
Route::get('buatpermohonan/{id}',[LhpPemeriksaanController::class, 'buatpermohonan'])->name('lhp.buatpermohonan')->middleware('auth');
Route::post('ajukan',[LhpPemeriksaanController::class, 'ajukan'])->name('lhp.ajukan')->middleware('auth');
Route::post('approve',[LhpPemeriksaanController::class, 'approve'])->name('lhp.approve')->middleware('auth');

Route::resource('skp', SkpController::class)->middleware('auth');
Route::get('rekapskp',[SkpController::class, 'rekap'])->name('skp.rekap')->middleware('auth');
Route::post('rekapskp2',[SkpController::class, 'rekap2'])->name('skp.rekap2')->middleware('auth');


Route::resource('login', LoginController::class)->middleware('guest');
Route::resource('register', RegisterController::class)->middleware('guest');
Route::get('/',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('logout',[LoginController::class, 'logout'])->name('login.logout')->middleware('auth');
