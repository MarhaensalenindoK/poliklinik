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
        Route::patch('/user', [Controllers\SuperAdminController::class, 'updateAccount']);
        Route::delete('/user', [Controllers\SuperAdminController::class, 'deleteAccount']);

        Route::get('/clinic', [Controllers\SuperAdminController::class, 'getClinic']);
    });
});

Route::group(['middleware' => ['auth', 'role:ADMIN'], 'prefix' => 'admin'], function(){
    Route::get('/dashboard', [Controllers\Admin\DashboardController::class, 'index']);
    Route::get('/admin-management', [Controllers\Admin\DashboardController::class, 'adminManagement']);
});




