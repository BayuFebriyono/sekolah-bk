<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GuruBkController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\KesiswaanController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\WaliKelasController;
use App\Http\Controllers\LoginController;
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

// Route Login
Route::post('/login_guru', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

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
