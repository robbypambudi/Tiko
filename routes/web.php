<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Chart\ChartController;
use App\Http\Controllers\Event\EventContoller;
use Illuminate\Support\Facades\Auth;

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

Route::get ('/', [HomeController::class, 'index'])->name('welcome');
Route::get ('/home', [HomeController::class, 'index'])->name('home');

Route::get('/event', [EventContoller::class, 'index'])->name('event');
Route::get('/event/{id}', [EventContoller::class, 'detail'])->name('event.detail')->middleware('auth');

Route::get('/add_chart/{id}', [ChartController::class, 'addKeranjang'])->name('add_chart')->middleware('auth');
Route::get('/chart', [ChartController::class, 'index'])->name('chart')->middleware('auth');
Route::get('remove_chart/{id}', [ChartController::class, 'removeKeranjang'])->name('remove_chart')->middleware('auth');

Route::get('/detail', function () {
    return view ('detail');
})->name('detail');

Route::get('/form', function () {
    return view ('form');
})->name('form');

Route::get('/keranjang', function () {
    return view ('keranjang');
})->name('keranjang');

Route::get('/bayar', function () {
    return view ('bayar');
})->name('bayar');

Route::get('/bayar', function () {
    return view ('bayar');
})->name('bayar');

// Login & Register
Route::get('/favorite', function () {
    return view('favorite');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::get ('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');


Route::post('/login', [LoginController::class, 'login'])->name('login');