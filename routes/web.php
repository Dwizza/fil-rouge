<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnonceController;

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
    return view('Particulier & entreprise View.index');
})->middleware('auth');
Route::get('/entreprise', function () {
    return view('Particulier & entreprise View.index');
});
Route::resource('annonces', AnnonceController::class)->middleware('auth');
route::group(['prefix' => 'admin'], function(){
    Route::view('/', 'admin.index');
    Route::view('/annonces', 'admin.annonces');
    Route::view('/users', 'admin.users');
})->middleware('auth');



Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
