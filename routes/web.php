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

Route::get('/', function () {
    return view('landingpage.index');
})->name('landingpage.index');

Route::get('sesi', [SessionController::class, 'index']);
Route::get('sesi/signup', [SessionController::class, 'signup']);
Route::post('sesi/login', [SessionController::class, 'login']);
Route::post('sesi/create', [SessionController::class, 'create']);

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::middleware(['auth'])->group(function () {
    Route::get('logout', [SessionController::class, 'logout'])->name('sesi.logout');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::get('/events/detail/{id}', [EventController::class, 'detail'])->name('events.detail');
    Route::get('/events/createdetail/{id}', [EventController::class, 'createdetail'])->name('events.createdetail');
    Route::post('/events', [EventController::class, 'index'])->name('events.index1');
    Route::get('/index1', [EventController::class, 'index'])->name('events.index1');
    Route::post('/events/join', [EventController::class, 'join'])->name('events.join');
    Route::post('/events/{event}/participants/{participant}/attendance', [EventController::class, 'updateAttendance'])->name('events.updateAttendance');
    Route::post('/events/{event}/participants/{participant}/feedback', [EventController::class, 'submitFeedback'])->name('events.submitFeedback');
    Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::post('/events/{id}', [EventController::class, 'update'])->name('events.update');
    Route::get('/events/{eventId}/downloadParticipant', [EventController::class, 'downloadParticipant'])->name('events.downloadParticipant');
    Route::get('/events/{eventId}/search', 'EventController@searchParticipant')->name('events.searchParticipant');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('settings', [SessionController::class, 'settings'])->name('settings');
    Route::post('settings', [SessionController::class, 'updateSettings'])->name('settings.update');
});
