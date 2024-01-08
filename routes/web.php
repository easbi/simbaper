<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterbarangController;
use App\Http\Controllers\TransaksimasukController;
use App\Http\Controllers\TransaksikeluarController;
use App\Http\Controllers\OpnameController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
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

Route::get('/', [MasterbarangController::class, 'index']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy']);

Route::resource('masterbarang', MasterbarangController::class)->parameters([
    'masterbarang' => 'kode_barang'
]);
Route::resource('transaksimasuk', TransaksimasukController::class);
Route::resource('transaksikeluar', TransaksikeluarController::class);
Route::resource('opname', OpnameController::class)->parameters([
    'opname' => 'kode_barang'
]);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
