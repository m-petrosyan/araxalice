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

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PortfolioCategoryController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('portfolio/random', [PortfolioCategoryController::class, 'randomImages']);
Route::get('portfolio_category', [PortfolioCategoryController::class, 'index']);
Route::get('portfolio_category/filters', [PortfolioCategoryController::class, 'getByFilters']);
Route::post('contact', [ContactController::class, 'store']);
Route::get('about', [AboutController::class, 'show']);

Route::middleware(['auth:api',])->group(function () {
    Route::get('user', [UserController::class, 'auth']);
    Route::put('user', [UserController::class, 'update']);
    Route::resource('portfolio_category', PortfolioCategoryController::class)->only('store', 'update', 'destroy');
    Route::post('portfolio/{portfolio_category}', [PortfolioController::class, 'store']);
    Route::resource('portfolio', PortfolioController::class)->only('update', 'destroy');
    Route::post('about', [AboutController::class, 'storeOrUpdate']);
});
