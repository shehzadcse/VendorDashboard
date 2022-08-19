<?php

use App\Http\Controllers\backendController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::group(['middleware' => 'auth:sanctum'], function(){
//     Route::get('user', [backendController::class, 'getalldata']);
// });

Route::get('ads', [backendController::class, 'getalldata']);
Route::post('register', [backendController::class, 'register']);
Route::post('login', [backendController::class, 'login']);
Route::post('create-ad', [backendController::class, 'createAd']);
Route::get('get-ad-by-id', [backendController::class, 'getAdData']);
Route::get('get-all-user-ads', [backendController::class, 'getUsersAllAds']);
Route::get('upload-image', [backendController::class, 'uploadImage']);