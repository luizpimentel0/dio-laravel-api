<?php

use App\Http\Controllers\BandController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/bands', [BandController::class, 'getAll']);
Route::get('/bands/genre/{genre}', [BandController::class, 'getBandsByGenre']);
Route::get('/bands/{id}', [BandController::class, 'getBandById']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
