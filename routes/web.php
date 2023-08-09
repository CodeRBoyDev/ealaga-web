<?php

use App\Http\Controllers\Visitor\LandingController;
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;

// Authentication
use App\Http\Controllers\DatabaseTestController;
use Illuminate\Support\Facades\Route;

//CLIENT
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Client\ScheduleController;
use App\Http\Controllers\Client\VolunteerController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');

// Client

Route::get('/client/home', [ClientHomeController::class, 'ClientHome'])->name('ClientHome');
Route::get('/client/schedule', [ScheduleController::class, 'ClientSchedule'])->name('ClientSchedule');
Route::post('/client/schedule/add', [ScheduleController::class, 'ClientScheduleAdd'])->name('ClientScheduleAdd');
Route::get('/client/schedule/slot', [ScheduleController::class, 'ClientScheduleSlot'])->name('ClientScheduleSlot');
Route::get('/client/schedule/list', [ScheduleController::class, 'ClientScheduleList'])->name('ClientScheduleList');
Route::get('/client/schedule/list/{id}', [ScheduleController::class, 'ClientScheduleView'])->name('ClientScheduleView');
Route::get('/client/schedule/history', [ScheduleController::class, 'ClientScheduleHistory'])->name('ClientScheduleHistory');

Route::get('/client/volunteer', [VolunteerController::class, 'ClientVolunteerList'])->name('ClientVolunteerList');

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');

Route::get('/test-database', [DatabaseTestController::class, 'testDatabase']);
