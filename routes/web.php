<?php

use Illuminate\Support\Facades\Route;
use Mockery\Undefined;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/profile', function () {
    return view('profile');
});

//Route dengan Parameter (WAJIB)
Route::get('/mahasiswa/{nama}', function ($nama = "Nur") {
    echo "<h1>Halo nama saya $nama</h1";
});

//Route tidak dengan Parameter (Tidak WAJIB)
Route::get('/mahasiswa2/{nama?}', function ($nama = "Nur") {
    echo "<h1>Halo nama saya $nama</h1";
});

//Route dengan Parameter > 1
Route::get('/profile/{nama?}/{pekerjaan?}', function ($nama = "Nur", $pekerjaan = "Mahasiswa") {
    echo "<h1>Halo nama saya $nama kerja $pekerjaan</h1";
});

//Redirect

Route::get('/hubungi', function () {
    echo "<h1> Hubungi Kami </h1>";
})->name("Call");

Route::get('/Halo', function () {
    echo "<a href='" . route('Call') . "'>" . route('Call') . "</a>";
});

Route::prefix('/dosen')->group(function () {
    Route::get('/jadwal', function () {
        echo "<h1>Jadwal dosen</h1>";
    });
    Route::get('/materi', function () {
        echo "<h1>Materi Perkuliahan</h1>";
    });
});

Route::get('/dosen', function () {
    return view('dosen.index');
});

Route::get('/fakultas', function () {
    // return view('fakultas.index', ['ilkom' => "Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"]);
    // return view('fakultas.index')->with('fakultas', ['Fakultas Ilmu Komputer dan Rekayasa', 'Fakultas Ilmu Ekonomi']);

    $kampus = 'Universitas Multi Data Palembang';
    // $fakultas = ["Fakultas Ilmu Komputer dan Rekayasa", "Fakultas Ilmu Ekonomi"];
    $fakultas = [];
    return view('fakultas.index', compact('fakultas', 'kampus'));
});
