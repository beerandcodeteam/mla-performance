<?php

use App\Http\Controllers\AdvisorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/advisors', [AdvisorController::class, 'index']);
Route::get('/dashboard', [AdvisorController::class, 'dashboard']);
