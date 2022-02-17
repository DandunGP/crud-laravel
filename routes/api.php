<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\StudentController;
use App\Http\Controllers\API\ClassroomController;
use App\Http\Controllers\API\ExtracurricularController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);

Route::middleware(['auth:sanctum'])->group(function () {
    // Route::get('/logout', [LoginController::class], 'logout');
    Route::get('/student', [StudentController::class, 'index']);
    Route::get('/classroom', [ClassroomController::class, 'index']);
    Route::get('/extra', [ExtracurricularController::class, 'index']);

    Route::post('/student/add', [StudentController::class, 'create']);
    Route::get('/student/{id}', [StudentController::class, 'edit']);
    Route::post('/student/{id}', [StudentController::class, 'update']);
    Route::delete('/student/{id}', [StudentController::class, 'destroy']);

    Route::post('/classroom/add', [ClassroomController::class, 'create']);
    Route::get('/classroom/{id}', [ClassroomController::class, 'edit']);
    Route::post('/classroom/{id}', [ClassroomController::class, 'update']);
    Route::delete('/classroom/{id}', [ClassroomController::class, 'destroy']);

    Route::post('/extra/add', [ExtracurricularController::class, 'create']);
    Route::get('/extra/{id}', [ExtracurricularController::class, 'edit']);
    Route::post('/extra/{id}', [ExtracurricularController::class, 'update']);
    Route::delete('/extra/{id}', [ExtracurricularController::class, 'destroy']);
});
