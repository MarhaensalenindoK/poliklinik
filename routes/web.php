<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\LoginController;


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
//     return view('authentication.login');
// });

Route::get('/', [LoginController::class, 'check']);
// No Auth

Route::get('/home', [Controllers\LandingPageController::class, 'index'])->name('landingpage');

Route::get('/{clinicId}/detail-clinic', [Controllers\LandingPageController::class, 'detailClinic'])->name('detail_clinic');

// Auth
Route::get('/login', function () {
    return view('authentication.login');
})->name('login');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'role:SUPERADMIN']], function(){
    Route::get('/dashboard', [Controllers\SuperAdminController::class, 'index'])->name('index');
    Route::get('/clinic-management', [Controllers\SuperAdminController::class, 'clinicManagement'])->name('clinicManagement');
    Route::get('/account-management', [Controllers\SuperAdminController::class, 'accountManagement'])->name('accountManagement');

    Route::prefix('database')->group(function () {
        Route::get('/superadmin', [Controllers\SuperAdminController::class, 'getSuperAdmin']);
        Route::post('/user/reset-password', [Controllers\SuperAdminController::class, 'resetPassword']);
        Route::get('/user', [Controllers\SuperAdminController::class, 'getUser']);
        Route::post('/user', [Controllers\SuperAdminController::class, 'createAccount']);
        Route::patch('/user', [Controllers\SuperAdminController::class, 'updateAccount']);
        Route::delete('/user', [Controllers\SuperAdminController::class, 'deleteAccount']);

        Route::get('/clinic', [Controllers\SuperAdminController::class, 'getClinic']);
        Route::post('/clinic', [Controllers\SuperAdminController::class, 'createClinic']);
        Route::delete('/clinic', [Controllers\SuperAdminController::class, 'deleteClinic']);
        Route::post('/clinic/update', [Controllers\SuperAdminController::class, 'updateClinic']);
    });
});

Route::group(['middleware' => ['auth', 'role:ADMIN'], 'prefix' => 'admin'], function(){
    Route::get('/dashboard', [Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/account-management', [Controllers\Admin\ManagementAccountController::class, 'index']);

    Route::prefix('database')->group(function () {
        Route::get('/users', [Controllers\Admin\ManagementAccountController::class, 'getUsers']);
        Route::post('/user/reset-password', [Controllers\Admin\ManagementAccountController::class, 'resetPassword']);
        Route::post('/user', [Controllers\Admin\ManagementAccountController::class, 'createAccount']);
        Route::patch('/user', [Controllers\Admin\ManagementAccountController::class, 'updateAccount']);
        Route::delete('/user', [Controllers\Admin\ManagementAccountController::class, 'deleteAccount']);
    });
});

Route::group(['middleware' => ['auth', 'role:DOCTOR'], 'prefix' => 'doctor'], function(){
    Route::get('/dashboard', [Controllers\Doctor\DashboardController::class, 'index']);
    Route::prefix('medicalHistory')->group(function () {
        Route::get('/queues', [Controllers\QueuesController::class, 'index']);
    });
});




