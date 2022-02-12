<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExtracurricularController;
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
Route::get('/student', [StudentController::class, 'index']);
Route::get('/student/add', [StudentController::class, 'create']);
Route::post('/student', [StudentController::class, 'store']);
Route::put('/student/{students}', [StudentController::class, 'update']);
Route::delete('/student/{student}', [StudentController::class, 'destroy']);
Route::get('/student/edit/{student}', [StudentController::class, 'edit']);

Route::get('/classroom', [ClassroomController::class, 'index']);
Route::get('/classroom/add', [ClassroomController::class, 'create']);
Route::post('/classroom', [ClassroomController::class, 'store']);
Route::put('/classroom/{classroom}', [ClassroomController::class, 'update']);
Route::delete('/classroom/{classroom}', [ClassroomController::class, 'destroy']);
Route::get('/classroom/edit/{classroom}', [ClassroomController::class, 'edit']);

Route::get('/extra', [ExtracurricularController::class, 'index']);
Route::get('/extra/add', [ExtracurricularController::class, 'create']);
Route::post('/extra', [ExtracurricularController::class, 'store']);
Route::put('/extra/{extracurricular}', [ExtracurricularController::class, 'update']);
Route::delete('/extra/{extracurricular}', [ExtracurricularController::class, 'destroy']);
Route::get('/extra/edit/{extracurricular}', [ExtracurricularController::class, 'edit']);
