<?php

use App\Http\Controllers\Controller;
use App\Models\MoU;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\MasukController;
use App\Http\Controllers\MoUController;
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

Route::post('/daftar', [DaftarController::class, 'daftar'])->middleware('guest');
Route::get('/masuk', [MasukController::class, 'index'])->name('login')->middleware('guest');
Route::post('/masuk', [MasukController::class, 'masuk'])->middleware('guest');
Route::post('/keluar', [MasukController::class, 'keluar'])->middleware('auth');

Route::get('/', [Controller::class, 'index']);
Route::get('/about', [Controller::class, 'about']);

Route::resource('/MoU', MoUController::class)->except('create', 'destroy')->middleware('auth');
