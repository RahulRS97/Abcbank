<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Example;
use App\Http\Controllers\UserController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/admin/register', [UserController::class,'register'])->name('register');
Route::post('/admin/register', [UserController::class,'regstore'])->name('regstore');
Route::view('admin/login','admin/login');
Route::post('/admin/login', [UserController::class,'login'])->name('login');
Route::get('/admin/dashboard', [UserController::class,'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/admin/deposit', [UserController::class,'depositget'])->name('depositget')->middleware('auth');
Route::post('/admin/deposit', [UserController::class,'depositpost'])->name('depositpost')->middleware('auth');
Route::get('/admin/withdraw', [UserController::class,'withdrawuser'])->name('withdrawuser')->middleware('auth');
Route::post('/admin/withdraw', [UserController::class,'withdrawpost'])->name('withdrawpost')->middleware('auth');
Route::get('/admin/transfer', [UserController::class,'transferuser'])->name('transferuser')->middleware('auth');
Route::post('/admin/transfer', [UserController::class,'transferpost'])->name('transferpost')->middleware('auth');
Route::get('/admin/statement', [UserController::class,'statementuser'])->name('statementuser')->middleware('auth');
Route::get('/admin/logout', [UserController::class,'logout'])->name('logout');

