<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaQrisController;
use App\Http\Controllers\PesertaEventController;
use App\Http\Controllers\QrisTransactionController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('participants', [PesertaQrisController::class, 'index'])->name('participants');
Route::get('top-events', [PesertaEventController::class, 'index'])->name('events');
Route::get('total-nominal-transactions', [QrisTransactionController::class, 'index'])->name('transactions');
Route::get('total-participant-businesses', [PesertaQrisController::class, 'total_business'])->name('participants.total_business');