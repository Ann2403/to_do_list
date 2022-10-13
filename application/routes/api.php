<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\CardsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->prefix('/v1')->group(static function () {
    Route::prefix('/cards')->group(static function () {
        Route::get('/', [CardsController::class, 'index']);
        Route::get('/{id}', [CardsController::class, 'show']);
        Route::post('/', [CardsController::class, 'create']);
        Route::put('/{id}', [CardsController::class, 'update']);
        Route::delete('/{id}', [CardsController::class, 'delete']);
    });
});
