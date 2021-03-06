<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\KampusController;
use App\Http\Controllers\ArticleController;


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
    return view('main');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/beasiswa', function () {
    return view('beasiswa.index');
})->name('beasiswa');

Route::middleware(['auth:sanctum', 'verified'])->get('/tes', function () {
    return view('tes.index');
})->name('tes');

// Route::middleware(['auth:sanctum', 'verified'])->get('/artikel', function () {
//     return view('artikel.index');
// })->name('artikel');

Route::middleware(['auth:sanctum', 'verified'])->get('/artikel', [ArticleController::class, 'index'])->name('artikel');

Route::middleware(['auth:sanctum', 'verified'])->get('/kampus', [KampusController::class, 'index'])->name('kampus');

Route::middleware(['auth:sanctum', 'verified'])->get('/kampus/jurusan', [KampusController::class, 'jurusan'])->name('jurusan');

Route::middleware(['auth:sanctum', 'verified'])->get('/kampus/buat', [KampusController::class, 'create'])->name('buat');

Route::middleware(['auth:sanctum', 'verified'])->get('/kampus/buatin', [KampusController::class, 'new'])->name('buatin');

Route::middleware(['auth:sanctum', 'verified'])->get('/kampus/jurusan/buat', [KampusController::class, 'createDept'])->name('buat jurusan');

Route::middleware(['auth:sanctum', 'verified'])->get('/kampus/jurusan/buatin', [KampusController::class, 'newDept'])->name('buatin jurusan');




// Route::get('Kampus', [KampusController::class, 'index']);



Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);
