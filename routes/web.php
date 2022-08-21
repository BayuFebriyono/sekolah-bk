<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GuruBkController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KesiswaanController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Siswa\SiswaController as SiswaBiasa;
use App\Http\Controllers\Admin\WaliKelasController;
use App\Http\Controllers\Admin\WargaKelasController;
use App\Http\Controllers\Bk\TataTertibController;
use App\Http\Controllers\Bk\TindakLanjutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RekamanTartibController;
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

Route::get('/', function () {
    return view('landing-page');
});

Route::get('/login_page', function () {
    return view('login');
})->middleware('guest')->name('login');

Route::get('/login_siswa', function () {
    return view('login_siswa');
})->middleware('guest')->name('login_siswa');

// Route Login
Route::post('/login_guru', [LoginController::class, 'login']);
Route::post('/login_siswa', [LoginController::class, 'siswaLogin']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/logout', [LoginController::class, 'logout']);

// Route Admin
Route::get('/admin-dashboard', [AdminController::class, 'index'])->middleware('guru');

// CRUD ADMIN

// CRUD SISWA
Route::resource('/admin-siswa', SiswaController::class)->middleware('guru');
// CRUD KELAS
Route::resource('/admin-kelas', KelasController::class)->middleware('guru');
// CRUD GURU
Route::resource('/admin-guru', GuruController::class)->middleware('guru');
// CRUD WALAS
Route::resource('/admin-walas', WaliKelasController::class)->middleware('guru');
// CRUD GURU BK
Route::resource('/admin-bk', GuruBkController::class)->middleware('guru');
// CRUD KESISWAAN
Route::resource('/admin-kesiswaan', KesiswaanController::class)->middleware('guru');
// CRUD WARGA KELAS
Route::resource('/admin-warga', WargaKelasController::class)->middleware('guru');


// Route BK
Route::get('/bk-dashboard', function () {
    return view('bk.main.main');
})->middleware('guru_bk');

// CRUD TATA TERTIB
Route::resource('/bk-tartib', TataTertibController::class)->middleware('guru_bk');

// CRUD REKAMAN TATATERTIB  nanti dikasih middleware ya
Route::resource('/rekaman-tartib', RekamanTartibController::class);

// CRUD Tindak_lanjut
Route::resource('/tindak-lanjut', TindakLanjutController::class);

// Route Siswa
Route::get('/siswa-dashboard', [SiswaBiasa::class, 'index']);
