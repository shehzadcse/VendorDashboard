<?php

use App\Http\Controllers\backendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ManageAdsController;
use App\Http\Controllers\AdminController;
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
//     return view('welcome');
// });
Route::get('/', [ManageUserController::class, 'index'])->name('home');




Route::get('bussiness_profile', [FrontendController::class, 'bussiness_profile'])->name('bussiness_profile');
Route::get('personal_profile', [FrontendController::class, 'personal_profile'])->name('personal_profile');

// Admin Menu Routes 
Route::get('login', [AdminController::class, 'index'])->name('admin_login');
Route::post('login', [AdminController::class, 'login'])->name('admin_login_submit');
Route::get('manageuser', [ManageUserController::class, 'index'])->name('manage_user');
Route::get('manageads', [ManageAdsController::class, 'index'])->name('manage_ads');


// Data Tables Route
Route::get('users-data', [ManageUserController::class, 'getData'])->name('users-data');
Route::post('update-status', [ManageUserController::class, 'UpdateUser'])->name('UpdateStatus');
Route::get('get-ad-by-id', [ManageUserController::class, 'getAdData'])->name('getUserAdsData');;
Route::get('ads-data', [ManageAdsController::class, 'getData'])->name('ads-data');
Route::post('update-ad-status', [ManageAdsController::class, 'UpdateStatus'])->name('UpdateAdStatus');



Route::post('bussiness_profile_save', [backendController::class,'bussiness_profile_save'])->name('bussiness_profile_save');
Route::post('personal_profile_save', [backendController::class,'personal_profile_save'])->name('personal_profile_save');

