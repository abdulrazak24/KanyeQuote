<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KanyeQuoteController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post(
    '/generate-api-token/{user}',
    [AuthController::class, 'generateApiToken']
);

Route::get(
    '/kanye-quotes', 
    [KanyeQuoteController::class, 'getQuotes']
);

Route::get(
    '/kanye-quotes/refresh', 
    [KanyeQuoteController::class, 'refreshQuotes']
);
