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

Route::get('/detail-clinic', function () {
    return view('detail_clinic');
})->name('detail_clinic');

// Auth
Route::get('/login', function () {
    return view('authentication.login');
})->name('login');

Route::post('/authenticate', [LoginController::class, 'authenticate'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'role:SUPERADMIN']], function(){
    Route::get('/dashboard', [Controllers\SuperAdminController::class, 'index'])->name('index');
});
