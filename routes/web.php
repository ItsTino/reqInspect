<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\FeedbackController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [SessionController::class, 'index']);
Route::post('/session', [SessionController::class, 'store']);
Route::get('/session/{uuid}', [SessionController::class, 'show'])->name('session.show');
Route::any('/capture/{uuid}', [SessionController::class, 'captureData'])->name('session.captureData');
Route::get('/session/{sessionUuid}/request/{requestId}', [SessionController::class, 'showRequest'])->name('session.showRequest');
Route::get('/statistics', [StatisticsController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store']);
