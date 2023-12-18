<?php

use App\Http\Controllers\MobileApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/mobile/login',[MobileApiController::class, 'login']);
Route::post('/mobile/register',[MobileApiController::class, 'register']);
Route::get('/mobile/ceklogin',[MobileApiController::class, 'ceklogin']);
Route::post('/mobile/logout',[MobileApiController::class, 'logout']);
Route::post('/mobile/fashion',[MobileApiController::class, 'fashion']);
Route::post('/mobile/search',[MobileApiController::class, 'search']);