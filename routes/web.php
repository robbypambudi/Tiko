<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Event\EventContoller;

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

Route::get('/detail', function () {
    return view ('detail');
})->name('detail');

Route::get('/form', function () {
    return view ('form');
})->name('form');


// Login & Register
Route::get('/login', function () {
    return view('login');
});
Route::get ('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');



Route::post('/login', [LoginController::class, 'login'])->name('login');