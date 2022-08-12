<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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


Route::get('/', function () {
    return 'Bienvenid@ a mi E-commerce.';
});

/* --------------------- AuthController -------------------- */
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(["middleware" => "jwt.auth"], function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::put('/updateduser', [AuthController::class, 'updatedUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
/* ------------------- UsersController ------------------ */

Route::group(["middleware" => ["jwt.auth", "isSuperAdmin"]], function () {
    /* ------------------------- ADMIN ---------------------- */
    Route::post('/user/add_admin/{id}', [UserController::class, 'rolAdmin']);
    Route::post('/user/delete_admin/{id}', [UserController::class, 'deleteRolAdmin']);
    /* ---------------------- SUPER ADMIN -------------------- */
    Route::post('/user/super_admin/{id}', [UserController::class, 'rolSuperAdmin']);
    Route::post('/user/delete_super_admin/{id}', [UserController::class, 'deleteRolSuperAdmin']);
});
/* ------------------- ProductsController ----------------- */

Route::group(["middleware" => "isSuperAdmin"], function () {
    Route::post('/create', [ProductController::class, 'createProduct']);
    Route::put('/updatedproduct/{id}', [ProductController::class, 'updatedProduct']);
    Route::delete('/deleteproduct/{id}', [ProductController::class, 'deleteProduct']);
});
Route::get('/productall', [ProductController::class, 'productAll']);
Route::get('/productlowcost/{price}', [ProductController::class, 'productLowCost']);
Route::get('/productexpensive/{price}', [ProductController::class, 'productExpensive']);
Route::get('/productname/{letra}', [ProductController::class, 'productName']);
Route::get('/productgenderf', [ProductController::class, 'productGenderF']);
Route::get('/productgenderm', [ProductController::class, 'productGenderM']);

/* ------------------- PurchasesController ---------------- */

