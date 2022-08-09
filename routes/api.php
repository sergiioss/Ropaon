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


Route::get('/', function(){
    return 'Bienvenid@ a mi E-commerce.';
});

/* --------------------- AuthController -------------------- */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(["middleware" => "jwt.auth"] , function() {
    Route::get('/me', [AuthController::class, 'me']);
    Route::post('/logout', [AuthController::class, 'logout']); 
});
/* ------------------- ClientsController ------------------ */
/* ------------------------- Admin ------------------------ */
/* ---------------------- SuperAdmin ---------------------- */


/* ------------------- ProductsController ----------------- */
/* ------------------- PurchasesController ---------------- */
