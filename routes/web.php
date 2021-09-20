<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('movie', MovieController::class);
Route::get('/search', [HomeController::class, 'search']);
Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// Route::resource('/movie', MovieController::class);
