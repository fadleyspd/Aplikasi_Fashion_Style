<?php

use App\Http\Controllers\FashionController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//User
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/create/user', [UserController::class, 'create'])->name('user.create');
Route::post('/store/user', [UserController::class, 'store'])->name('user.store');
Route::get('/edit/user/{id}', [UserController::class, 'edit'])->name('user.edit');
Route::get('/show/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::patch('/update/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/delete/user/{id}', [UserController::class, 'destroy'])->name('user.delete');

//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/create/kategori', [KategoriController::class, 'create'])->name('kategori.create');
Route::post('/store/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::get('/edit/kategori/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
Route::patch('/update/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
Route::delete('/delete/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');

//Fashion
Route::get('/fashion', [FashionController::class, 'index'])->name('fashion.index');
Route::get('/create/fashion', [FashionController::class, 'create'])->name('fashion.create');
Route::post('/store/fashion', [FashionController::class, 'store'])->name('fashion.store');
Route::get('/edit/fashion/{id}', [FashionController::class, 'edit'])->name('fashion.edit');
Route::get('/show/fashion/{id}', [FashionController::class, 'show'])->name('fashion.show');
Route::patch('/update/fashion/{id}', [FashionController::class, 'update'])->name('fashion.update');
Route::delete('/delete/fashion/{id}', [FashionController::class, 'destroy'])->name('fashion.delete');