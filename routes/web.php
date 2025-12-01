<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr',function () {
    return 'Selamat Datang di Website Kampus PCR!';
});

Route::get('/mahasiswa', function () {
    return 'Halo Mahasiswa';
});

Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);

Route::get('/nama/{param1}', function ($param1){
    return 'Nama Saya : '.$param1;
});

Route::get('/nim/{param1?}', function ($param1 = ''){
    return 'Nim Saya : '.$param1;
});

Route::get('/about', function () {
    return view('halaman-about');
});


Route::get('/matakuliah/show/{kode}', [MatakuliahController::class, 'show']);

Route::get('/matakuliah', [MatakuliahController::class, 'index'])
->name('matakuliah');

Route::get('/home', [homeController::class, 'index'])
->name('home');

Route::post('/question/store', [QuestionController::class, 'store'])
->name('question.store');

// Route::get('/login', [AuthController::class, 'index'])->name('login');
// Route::post('/auth/login', [AuthController::class, 'login'])->name('login.post');
// Route::get('/beranda', function () {
//     return view('beranda');
// });

Route::get('/pegawai', [PegawaiController::class, 'index']);

Route::get('dashboard', [DashboardController::class, 'index'])
->name('dashboard');

Route::resource('pelanggan', PelangganController::class);

Route::resource('user', UserController::class);


Route::middleware('guest')->group(function () {
    // Halaman Form Login
    Route::get('/auth', [AuthController::class, 'index'])->name('login');

    // Proses Submit Login
    Route::post('/auth/login', [AuthController::class, 'login'])->name('login.process');

    // Halaman Depan
    Route::get('/', function () {
        return view('welcome');
    });
});

// Halaman wajib login
Route::middleware('auth')->group(function () {
    // Logout (Bisa diakses semua user yang login)
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // --- DASHBOARD UNTUK USER BIASA ---
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Fitur User Biasa (Contoh: Kirim Pertanyaan)
    Route::post('question/store', [QuestionController::class, 'store'])->name('question.store');
    Route::get('/home', [homeController::class, 'index']);

    // Khusus Admin
    Route::middleware(['role:admin'])->prefix('admin')->group(function () {
        Route::resource('user', UserController::class);
        Route::resource('pelanggan', PelangganController::class);
    });
});
