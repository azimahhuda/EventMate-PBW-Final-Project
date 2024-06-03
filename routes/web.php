<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LPController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;


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

Route::get('/index', [LPController::class, 'index']);

Route::get('sesi', [SessionController::class, 'index']);
Route::get('sesi/signup', [SessionController::class, 'signup']);
Route::get('sesi/login', [SessionController::class, 'login']);
Route::get('sesi/create', [SessionController::class, 'create']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);
