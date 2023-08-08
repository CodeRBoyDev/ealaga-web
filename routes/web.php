<?php

use App\Http\Controllers\Visitor\LandingController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;

// Authentication
use App\Http\Controllers\DatabaseTestController;
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

// Route::get('/', function () {
//     return view('guest.landing');
// })->name('landing');

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/ticket', function () {
    return view('client.ticket');
})->name('ticket');

// Client

Route::get('/client-home', function () {
    return view('client.home');
})->name('clientHome');

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/test-database', [DatabaseTestController::class, 'testDatabase']);
