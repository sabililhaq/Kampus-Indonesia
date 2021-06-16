<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginWithGoogleController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/artikel', function () {
    return view('artikel.index');
})->name('artikel');

Route::middleware(['auth:sanctum', 'verified'])->get('/kampus', function () {
    return view('kampus.index');
})->name('kampus');



Route::get('authorized/google', [LoginWithGoogleController::class, 'redirectToGoogle']);
Route::get('authorized/google/callback', [LoginWithGoogleController::class, 'handleGoogleCallback']);
