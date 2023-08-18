<?php
// Authentication
use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;

//CLIENT
use App\Http\Controllers\Client\ClientHomeController;
use App\Http\Controllers\Client\ScheduleController;
use App\Http\Controllers\Client\VolunteerController;

// Comorbidity Management
use App\Http\Controllers\ComorbidityManagement\ComorbidityController;

// Dashboard
use App\Http\Controllers\Dashboard\AnaylticsController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ReportController;

// Volunteer Management
use App\Http\Controllers\VolunteerManagement\PersonnelVolunteerController;
use App\Http\Controllers\VolunteerManagement\ApplicationController;

// User Management
use App\Http\Controllers\DatabaseTestController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\UserManagement\UserListController;
use App\Http\Controllers\UserManagement\UserViewController;

// Visitor
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

Route::get('/', [LandingController::class, 'VisitorLanding'])->name('VisitorLanding');

Route::get('/ticket', function () {
    return view('client.ticket');
})->name('ticket');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::middleware(['access_level:2'])->group(function () {
// Client
    Route::get('/client/home', [ClientHomeController::class, 'ClientHome'])->name('ClientHome');
    Route::get('/client/schedule', [ScheduleController::class, 'ClientSchedule'])->name('ClientSchedule');
    Route::post('/client/schedule/add', [ScheduleController::class, 'ClientScheduleAdd'])->name('ClientScheduleAdd');
    Route::get('/client/schedule/slot', [ScheduleController::class, 'ClientScheduleSlot'])->name('ClientScheduleSlot');
    Route::get('/client/schedule/list', [ScheduleController::class, 'ClientScheduleList'])->name('ClientScheduleList');
    Route::get('/client/schedule/list/{id}', [ScheduleController::class, 'ClientScheduleView'])->name('ClientScheduleView');
    Route::get('/client/schedule/history', [ScheduleController::class, 'ClientScheduleHistory'])->name('ClientScheduleHistory');
    Route::get('/client/schedule/cancel/{id}', [ScheduleController::class, 'ClientScheduleCancel'])->name('ClientScheduleCancel');
    Route::post('/client/review/add', [ScheduleController::class, 'ClientScheduleReview'])->name('ClientScheduleReview');

// Client volunteer
    Route::get('/client/volunteer', [VolunteerController::class, 'ClientVolunteerList'])->name('ClientVolunteerList');
    Route::post('/client/volunteer/submit', [VolunteerController::class, 'ClientVolunteerSubmit'])->name('ClientVolunteerSubmit');
    Route::delete('/client/volunteer/delete', [VolunteerController::class, 'ClientVolunteerDelete'])->name('ClientVolunteerDelete');
});
// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'postRegister'])->name('postRegister');
Route::get('/register/email-otp', [RegisterController::class, 'emailOTP'])->name('emailOTP');
Route::post('/register/confirm-otp', [RegisterController::class, 'confirmOTP'])->name('confirmOTP');
Route::post('/register/resend-otp', [RegisterController::class, 'resendOTP'])->name('resendOTP');

Route::middleware(['access_level:0,1'])->group(function () {
// Dashboard
    Route::get('/osca-dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user-statistics', [AnaylticsController::class, 'getUserStatistics'])->name('getUserStatistics');
    Route::get('/services-statistics', [AnaylticsController::class, 'getServicesStatistics'])->name('getServicesStatistics');
    Route::get('/schedules-statistics', [AnaylticsController::class, 'getSchedulesStatistics'])->name('getSchedulesStatistics');
    Route::get('/top-list', [AnaylticsController::class, 'getTopList'])->name('getTopList');
    Route::get('/comorbidity-statistics', [AnaylticsController::class, 'getComorbidityStatisticxs'])->name('getComorbidityStatisticxs');

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

    // Volunteer Management
    Route::get('/volunteer-management/volunteer/list', [PersonnelVolunteerController::class, 'index'])->name('volunteerList');
    Route::get('/volunteer-list', [PersonnelVolunteerController::class, 'getVolunteer'])->name('getVolunteer');
    Route::post('/volunteer-management/volunteer/add', [PersonnelVolunteerController::class, 'addVolunteer'])->name('addVolunteer');
    Route::post('/volunteer-management/volunteer/update', [PersonnelVolunteerController::class, 'updateVolunteer'])->name('updateVolunteer');
    Route::post('/volunteer-management/volunteer/delete', [PersonnelVolunteerController::class, 'deleteVolunteer'])->name('deleteVolunteer');

    // Application Management
    Route::get('/application-management/application/list', [ApplicationController::class, 'index'])->name('applicationList');
    Route::get('/application-list', [ApplicationController::class, 'getApplication'])->name('getApplication');
    // Route::post('/application-management/application/add', [ApplicationController::class, 'addVolunteer'])->name('addVolunteer');
    Route::post('/application-management/application/approve', [ApplicationController::class, 'approveApplication'])->name('approveApplication');
    Route::post('/application-management/application/deny', [ApplicationController::class, 'denyApplication'])->name('denyApplication');
    // Route::post('/application-management/application/delete', [ApplicationController::class, 'deleteApplication'])->name('deleteApplication');


});
Route::middleware(['access_level:0,1,2'])->group(function () {

// Profile Page
    Route::get('/profile-page', [ProfileController::class, 'profilePage'])->name('profilePage');
    Route::get('/profile-edit', [ProfileController::class, 'profileEdit'])->name('profileEdit');
    Route::post('/profile-update', [ProfileController::class, 'profileUpdate'])->name('profileUpdate');
    Route::post('/profile-comorbidty', [ProfileController::class, 'profileComorbidity'])->name('profileComorbidity');
    Route::post('/profile-email', [ProfileController::class, 'profileEmail'])->name('profileEmail');
    Route::post('/profile-password', [ProfileController::class, 'profilePassword'])->name('profilePassword');
    Route::post('/profile-username', [ProfileController::class, 'profileUsername'])->name('profileUsername');
});
Route::middleware(['access_level:0,1'])->group(function () {
// Report Management
    Route::get('/report-management', [ReportController::class, 'index'])->name('reportList');
    Route::get('/users-report', [ReportController::class, 'usersReport'])->name('usersReport');
    Route::get('/barangay-report', [ReportController::class, 'barangayReport'])->name('barangayReport');
    Route::get('/services-report', [ReportController::class, 'servicesReport'])->name('servicesReport');
    Route::get('/comorbidities-report', [ReportController::class, 'comorbiditiesReport'])->name('comorbiditiesReport');
    Route::get('/generate-pdf', [ReportController::class, 'generatePDF'])->name('generatePDF');
});
Route::get('/test-database', [DatabaseTestController::class, 'testDatabase']);
