<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
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

Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

//Asi estan agrupados por los que tienen jwt.

Route::group(["middleware" => "jwt.auth"] , function() {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']); 
});

/* Route::get('/me', [AuthController::class, 'me'])->middleware('jwt.auth');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('jwt.auth'); */