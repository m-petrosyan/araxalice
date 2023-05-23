<?php

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

use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api',])->group(function () {
    Route::get('user', [UserController::class, 'auth']);
    Route::put('user', [UserController::class, 'update']);
    Route::resource('portfolio', PortfolioController::class)->only('index', 'store', 'update', 'destroy');
});
