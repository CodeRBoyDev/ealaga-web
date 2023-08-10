<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Client\ClientHomeController;

// Comorbidity Management
use App\Http\Controllers\Client\ScheduleController;
// Dashboard
use App\Http\Controllers\Client\VolunteerController;
// User Management
use App\Http\Controllers\ComorbidityManagement\ComorbidityController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\DatabaseTestController;
use App\Http\Controllers\UserManagement\UserListController;

//CLIENT
use App\Http\Controllers\UserManagement\UserViewController;
use App\Http\Controllers\Visitor\LandingController;
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
Route::post('/register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('/register/email-otp', [RegisterController::class, 'emailOTP'])->name('emailOTP');
Route::post('/register/confirm-otp', [RegisterController::class, 'confirmOTP'])->name('confirmOTP');
Route::post('/register/resend-otp', [RegisterController::class, 'resendOTP'])->name('resendOTP');

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
// User Management
Route::get('/user-management/users/list', [UserListController::class, 'index'])->name('userList');
Route::get('/user-list', [UserListController::class, 'getUsers'])->name('getUsers');
Route::post('/user-management/users/add', [UserListController::class, 'store'])->name('postUser');
Route::post('/user-management/users/{userId}', [UserListController::class, 'update'])->name('updateUser');
Route::get('/user-management/users/view/{userId}', [UserViewController::class, 'userView'])->name('userView');
Route::post('/user-management/users/{userId}/is-active', [UserViewController::class, 'isActive'])->name('isActive');
Route::post('/user-management/users/{userId}/comorbidity', [UserViewController::class, 'UpdateComorbidity'])->name('UpdateComorbidity');

// Comorbidity Management
Route::get('/comorbidity-management/comorbidity/list', [ComorbidityController::class, 'index'])->name('comorbidityList');
Route::get('/comorbidity-list', [ComorbidityController::class, 'getcomorbidity'])->name('getcomorbidity');
Route::post('/comorbidity-management/comorbidity/add', [ComorbidityController::class, 'addComorbidity'])->name('addComorbidity');
Route::post('/comorbidity-management/comorbidity/delete', [ComorbidityController::class, 'deleteComorbidity'])->name('deleteComorbidity');
Route::post('/comorbidity-management/comorbidity/update', [ComorbidityController::class, 'updateComorbidity'])->name('updateComorbidity');

Route::get('/test-database', [DatabaseTestController::class, 'testDatabase']);
