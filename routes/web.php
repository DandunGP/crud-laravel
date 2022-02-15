<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ExtracurricularController;

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
//     return view('index');
// });

Route::get('/', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/home', [LoginController::class, 'home'])->middleware('auth', 'checkMember');

Route::get('/student', [StudentController::class, 'index'])->middleware('auth', 'checkRole');
Route::get('/student/add', [StudentController::class, 'create'])->middleware('auth', 'checkRole');
Route::post('/student', [StudentController::class, 'store']);
Route::put('/student/{students}', [StudentController::class, 'update']);
Route::delete('/student/{student}', [StudentController::class, 'destroy']);
Route::get('/student/edit/{student}', [StudentController::class, 'edit'])->middleware('auth', 'checkRole');

Route::get('/classroom', [ClassroomController::class, 'index'])->middleware('auth', 'checkRole');
Route::get('/classroom/add', [ClassroomController::class, 'create'])->middleware('auth', 'checkRole');
Route::post('/classroom', [ClassroomController::class, 'store']);
Route::put('/classroom/{classroom}', [ClassroomController::class, 'update']);
Route::delete('/classroom/{classroom}', [ClassroomController::class, 'destroy']);
Route::get('/classroom/edit/{classroom}', [ClassroomController::class, 'edit'])->middleware('auth', 'checkRole');

Route::get('/extra', [ExtracurricularController::class, 'index'])->middleware('auth', 'checkRole');
Route::get('/extra/add', [ExtracurricularController::class, 'create'])->middleware('auth', 'checkRole');
Route::post('/extra', [ExtracurricularController::class, 'store']);
Route::put('/extra/{extracurricular}', [ExtracurricularController::class, 'update']);
Route::delete('/extra/{extracurricular}', [ExtracurricularController::class, 'destroy']);
Route::get('/extra/edit/{extracurricular}', [ExtracurricularController::class, 'edit'])->middleware('auth', 'checkRole');
