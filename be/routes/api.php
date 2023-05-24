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

use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('portfolio', [PortfolioController::class, 'index']);
Route::post('contact', [ContactController::class, 'store']);

Route::middleware(['auth:api',])->group(function () {
    Route::get('user', [UserController::class, 'auth']);
    Route::put('user', [UserController::class, 'update']);
    Route::resource('portfolio', PortfolioController::class)->only('store', 'update', 'destroy');
});
