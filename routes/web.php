<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LPController;
use App\Http\Controllers\EventController;
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
Route::post('sesi/login', [SessionController::class, 'login']);
Route::post('sesi/create', [SessionController::class, 'create']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [SessionController::class, 'logout'])->name('sesi.logout');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/detail/{id}', [EventController::class, 'detail'])->name('events.detail');
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::post('/events/join', [EventController::class, 'join'])->name('events.join');
});
