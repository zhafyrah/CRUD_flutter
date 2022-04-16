<?php

use App\Http\Controllers\ProdukController;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/produk', function () {
//     return view('produk.index');
 // });

 Route::get('/produk', [ProdukController::class, 'index']);
 Route::get('/produk/tambah', [ProdukController::class, 'create']);
 Route::post('/produk/tambah', [ProdukController::class, 'store']);
