<?php

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use App\Http\Controllers\DataPetugas;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\PerhitunganController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\AlternatifDetailController;
use App\Http\Controllers\PerhitunganSubkriteriaController;

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
    return view('index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    // Halaman Dashboard
    Route::get('/dashboard', function () {
        return view('pages.index', [
            "title" => 'Dashboard',
            "active" => "dashboard",
            "alternatif" => Alternatif::get()->count(),
            "kriteria" => Kriteria::get()->count(),
            "subkriteria" => SubKriteria::get()->count(),
        ]);
    });

    Route::resource('kriteria', KriteriaController::class);
    Route::resource('subkriteria', SubkriteriaController::class);

    Route::get('/alternatif', [AlternatifController::class, 'index']);
    Route::post('/alternatif/store', [AlternatifController::class, 'store']);
    Route::get('/alternatif/edit', [AlternatifController::class, 'edit']);
    Route::put('/alternatif/update', [AlternatifController::class, 'update']);
    Route::delete('/alternatif/destroy', [AlternatifController::class, 'destroy']);

    Route::get('/alternatif_detail', [AlternatifDetailController::class, 'index']);
    Route::post('/alternatif_detail/store', [AlternatifDetailController::class, 'store']);
    Route::get('/alternatif_detail/edit', [AlternatifDetailController::class, 'edit']);
    Route::put('/alternatif_detail/update', [AlternatifDetailController::class, 'update']);
    Route::delete('/alternatif_detail/destroy', [AlternatifDetailController::class, 'destroy']);

    Route::get('/perhitungan', [PerhitunganController::class, 'index']);
    Route::post('/perhitungan/store', [PerhitunganController::class, 'store']);
    Route::get('/perhitungan/hasil', [PerhitunganController::class, 'hasil']);
    Route::get('/perhitungan/edit', [PerhitunganController::class, 'edit']);
    Route::put('/perhitungan/update', [PerhitunganController::class, 'update']);
    Route::delete('/perhitungan/destroy', [PerhitunganController::class, 'destroy']);

    Route::get('/perhitungan_subkriteria', [PerhitunganSubkriteriaController::class, 'index']);
    Route::get('/perhitungan_subkriteria/matrix', [PerhitunganSubkriteriaController::class, 'matrix']);
    Route::get('/perhitungan_subkriteria/hasil', [PerhitunganSubkriteriaController::class, 'hasil']);
    Route::get('/perhitungan_subkriteria/alternatif', [PerhitunganSubkriteriaController::class, 'alternatif']);
    Route::get('/perhitungan_subkriteria/prangkingan', [PerhitunganSubkriteriaController::class, 'prangkingan']);
    Route::post('/perhitungan_subkriteria/store', [PerhitunganSubkriteriaController::class, 'store']);
    Route::get('/perhitungan_subkriteria/edit', [PerhitunganSubkriteriaController::class, 'edit']);
    Route::put('/perhitungan_subkriteria/update', [PerhitunganSubkriteriaController::class, 'update']);
    Route::delete('/perhitungan_subkriteria/destroy', [PerhitunganSubkriteriaController::class, 'destroy']);

    Route::resource('/datapengguna', DataPetugas::class)->except('show', 'create');
});
