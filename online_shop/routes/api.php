<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\ProdukAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::get('/produk');
Route::get('/produk', [ProdukAPIController::class, 'index']);
Route::get('/produk/tambah', [ProdukAPIController::class, 'create']);
Route::post('/produk', [ProdukAPIController::class, 'store']);
Route::get('/produk/{id}/edit', [ProdukAPIController::class, 'edit']);
Route::put('/produk/{id}', [ProdukAPIController::class, 'show']);
Route::put('/produk/{id}', [ProdukAPIController::class, 'update']);
Route::delete('/produk/{id}', [ProdukAPIController::class, 'destroy']);
