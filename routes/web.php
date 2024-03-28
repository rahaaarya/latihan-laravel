<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MasterDataController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('index');
});

Route::get('/user', [UserController::class, 'index'])->name('UserIndex');
Route::get('/tambahuser', [UserController::class, 'tambah']);
Route::post('/kirimuser', [UserController::class, 'add']);


Route::get('/master', [MasterDataController::class, 'index'])->name('UserIndex');
Route::get('/tambahmaster', [MasterDataController::class, 'tambahMaster']);
Route::post('/kirimmaster', [MasterDataController::class, 'addMaster']);


Route::get('/edit/{id_barang}', [MasterDataController::class, 'edit'])->name('editData');
Route::put('/update/{id_barang}', [MasterDataController::class, 'update'])->name('updateData');
Route::delete('/delete/{id_barang}', [MasterDataController::class, 'delete'])->name('deleteData');
