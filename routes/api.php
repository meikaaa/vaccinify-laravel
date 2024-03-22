<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ConsultationController;
use App\Http\Controllers\Api\SpotController;
use App\Http\Controllers\Api\VaccinationController;
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

Route::prefix('v1')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::post('login', [AuthController::class, 'login']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
    Route::middleware('check_token')->group(function(){
        Route::get('consultations', [ConsultationController::class, 'index']);
        Route::post('consultations', [ConsultationController::class, 'store']);
        Route::get('spots', [SpotController::class, 'index']);
        
        Route::get('vaccinations', [VaccinationController::class, 'index']);
        Route::post('vaccinations', [VaccinationController::class, 'store']);
     
    });
});
