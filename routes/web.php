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
Route::get('/login', [LoginController::class, 'check'])->name('login');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('reset-password', [LoginController::class, 'resetPassword'])->name('resetPassword');
Route::post('/payment/print', [Controllers\Patient\HistoryPaymentController::class, 'print']);


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
    Route::prefix('database')->group(function () {
        Route::post('/queue', [Controllers\Doctor\DashboardController::class, 'createQueue']);
        Route::delete('/queue', [Controllers\Doctor\QueuesController::class, 'deleteQueue']);
    });

    Route::prefix('medical-history')->group(function () {
        Route::get('/queues', [Controllers\Doctor\QueuesController::class, 'index']);
        Route::delete('/action', [Controllers\Doctor\QueuesController::class, 'deleteAction']);
        Route::patch('/', [Controllers\Doctor\QueuesController::class, 'updateMedicalHistory']);
    });
});

Route::group(['middleware' => ['auth', 'role:RECEPTIONIST'], 'prefix' => 'receptionist'], function(){
    Route::get('/dashboard', [Controllers\Receptionist\DashboardController::class, 'index']);
    Route::get('/patient-management', [Controllers\Receptionist\PatientManagementController::class, 'index']);

    Route::get('/queue-management', [Controllers\Receptionist\QueueManagementController::class, 'indexManagement']);
    Route::get('/add-queue-page', [Controllers\Receptionist\QueueManagementController::class, 'indexQueue']);
    Route::get('/queue-done', [Controllers\Receptionist\QueueManagementController::class, 'indexQueueDone']);

    Route::get('/medicine-management', [Controllers\Receptionist\MedicineManagementController::class, 'index']);

    Route::prefix('database')->group(function () {
        Route::post('/patient', [Controllers\Receptionist\PatientManagementController::class, 'createPatient']);
        Route::patch('/patient', [Controllers\Receptionist\PatientManagementController::class, 'updatePatient']);
        Route::delete('/patient', [Controllers\Receptionist\PatientManagementController::class, 'deletePatient']);

        Route::post('/medicine', [Controllers\Receptionist\MedicineManagementController::class, 'createMedicine']);
        Route::patch('/medicine', [Controllers\Receptionist\MedicineManagementController::class, 'updateMedicine']);
        Route::delete('/medicine', [Controllers\Receptionist\MedicineManagementController::class, 'deleteMedicine']);

        Route::post('/queue', [Controllers\Receptionist\QueueManagementController::class, 'createQueue']);
        Route::patch('/queue', [Controllers\Receptionist\QueueManagementController::class, 'updateQueue']);
        Route::delete('/queue', [Controllers\Receptionist\QueueManagementController::class, 'deleteQueue']);

        Route::post('/queue/existing', [Controllers\Receptionist\QueueManagementController::class, 'createQueueExisting']);
    });
});

Route::group(['middleware' => ['auth', 'role:PATIENT'], 'prefix' => 'patient'], function(){
    Route::get('/dashboard', [Controllers\Patient\DashboardController::class, 'index']);
    Route::get('/history-payment', [Controllers\Patient\HistoryPaymentController::class, 'index']);
    Route::post('/payment/print', [Controllers\Patient\HistoryPaymentController::class, 'print']);
});

