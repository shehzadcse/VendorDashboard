<?php

use App\Http\Controllers\backendController;
use App\Http\Controllers\FrontendController;
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
    return view('welcome');
});




Route::get('bussiness_profile', [FrontendController::class, 'bussiness_profile'])->name('bussiness_profile');
Route::get('personal_profile', [FrontendController::class, 'personal_profile'])->name('personal_profile');





Route::post('bussiness_profile_save', [backendController::class,'bussiness_profile_save'])->name('bussiness_profile_save');
Route::post('personal_profile_save', [backendController::class,'personal_profile_save'])->name('personal_profile_save');

