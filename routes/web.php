<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\homeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\loginController;

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
Route::get('/matakuliah', [MatakuliahController::class, 'index']);

//hahahahahahhahahahah ajahhahahahahah

Route::get('/home', [homeController::class, 'index']);

Route::post('question/store', [QuestionController::class, 'store'])
->name('question.store');


Route::get('/auth', [loginController::class, 'index'])
->name('login.index');
