<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\auth\LogoutController;
use App\Http\Controllers\Api\Admin\DataBarangController;
use App\Http\Controllers\Api\Admin\DataServisController;
use App\Http\Controllers\Api\Admin\PeminjamanController;
use App\Http\Controllers\Api\Admin\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * route "/login"
 * @method "POST"
 */
// Route Login
Route::post('/login', [App\Http\Controllers\Api\Auth\LoginController::class, 'index']);

/**
 * route "/logout"
 * @method "POST
 */
Route::post('/logout', [App\Http\Controllers\Api\Auth\LogoutController::class, '__invoke']);

/**
 * route "/databarang"
 * @method "ALL"
 */
// Route Databarang
Route::post('/data_barangs/store', [App\Http\Controllers\Api\Admin\DataBarangController::class, 'store'])->name('data_barangs.store');
Route::get('/data_barangs/show', [App\Http\Controllers\Api\Admin\DataBarangController::class, 'index'])->name('data_barangs.show');
Route::get('/data_barangs/{id}', [App\Http\Controllers\Api\Admin\DataBarangController::class, 'showId'])->name('data_barangs.showId');
Route::put('/data_barangs/update/{id}', [App\Http\Controllers\Api\Admin\DataBarangController::class, 'update']);
Route::delete('/data_barangs/destroy/{id}', [App\Http\Controllers\Api\Admin\DataBarangController::class, 'destroy']);

/**
 * route "/dataservis"
 * @method "ALL"
 */
// Route Dataservis
Route::post('/data_servis/store', [App\Http\Controllers\Api\Admin\DataServisController::class, 'store'])->name('data_servis.store');
Route::get('/data_servis/show', [App\Http\Controllers\Api\Admin\DataServisController::class, 'index'])->name('data_servis.show');
Route::get('/data_servis/{id}', [App\Http\Controllers\Api\Admin\DataServisController::class, 'showId'])->name('data_servis.showId');
Route::put('/data_servis/update/{id}', [App\Http\Controllers\Api\Admin\DataServisController::class, 'update']);
Route::delete('/data_servis/destroy/{id}', [App\Http\Controllers\Api\Admin\DataServisController::class, 'destroy']);

/**
 * route "/datapeminjaman"
 * @method "ALL"
 */
// Route Datapeminjaman
Route::get('/data_peminjaman/show', [App\Http\Controllers\Api\Admin\PeminjamanController::class, 'index'])->name('data_peminjaman.index');
Route::post('/data_peminjaman/store/{user_id}', [App\Http\Controllers\Api\Admin\PeminjamanController::class, 'store'])->name('data_peminjaman.store');
Route::post('/data_peminjaman/return/{id}', [App\Http\Controllers\Api\Admin\PeminjamanController::class, 'returnItem']);
Route::get('/data_peminjaman/show/{userId}', [PeminjamanController::class, 'showByUser']);
Route::get('/laporan_peminjaman/show/{userId}', [PeminjamanController::class, 'showLaporanByUser']);
Route::get('/laporan_peminjaman/show', [App\Http\Controllers\Api\Admin\PeminjamanController::class, 'showAllLaporan']);


/**
 * route "/user"
 * @method "ALL"
 */
// Route User
Route::get('/users', [UserController::class, 'index']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);



