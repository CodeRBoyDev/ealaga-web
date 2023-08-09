<?php

// Authentication
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;

// Comorbidity Management
use App\Http\Controllers\ComorbidityManagement\ComorbidityController;

// Dashboard
use App\Http\Controllers\Dashboard\DashboardController;

// User Management
use App\Http\Controllers\DatabaseTestController;
use App\Http\Controllers\UserManagement\UserListController;
use App\Http\Controllers\UserManagement\UserViewController;
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

Route::get('/', function () {
    return view('guest.landing');
})->name('landing');

// Client

Route::get('/client-home', function () {
    return view('client.home');
})->name('clientHome');

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');

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
