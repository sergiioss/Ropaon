<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
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
Illuminate\Support\Facades\Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(["middleware" => "jwt.auth"], function () {
    Route::get('/me', [AuthController::class, 'me']);
    Route::put('/updateduser', [AuthController::class, 'updatedUser']);
    Route::post('/logout', [AuthController::class, 'logout']);
});
/* ------------------- UsersController ------------------ */

Route::group(["middleware" => ["jwt.auth", "isMaster"]], function () {
    /* ------------------------- ADMIN ---------------------- */
    Route::post('/user/add_admin/{id}', [UserController::class, 'rolAdmin']);
    Route::delete('/user/delete_admin/{id}', [UserController::class, 'deleteRolAdmin']);
    /* ---------------------- SUPER ADMIN -------------------- */
    Route::post('/user/super_admin/{id}', [UserController::class, 'rolSuperAdmin']);
    Route::delete('/user/delete_super_admin/{id}', [UserController::class, 'deleteRolSuperAdmin']);
});
/* ------------------- ProductsController ----------------- */

Route::group(["middleware" => "isAdmin"], function () {
    Route::post('/create', [ProductController::class, 'createProduct']);
    Route::put('/updatedproduct/{id}', [ProductController::class, 'updatedProduct']);
    Route::delete('/deleteproduct/{id}', [ProductController::class, 'deleteProduct']);
});
Route::get('/productall', [App\Http\Controllers\ProductController::class, 'productAll']);
Route::get('/productlowcost/{price}', [ProductController::class, 'productLowCost']);
Route::get('/productexpensive/{price}', [ProductController::class, 'productExpensive']);
Route::get('/productname/{letra}', [ProductController::class, 'productName']);
Route::get('/productgenderf', [ProductController::class, 'productGenderF']);
Route::get('/productgenderm', [ProductController::class, 'productGenderM']);

/* ------------------- PurchasesController ---------------- */
Route::group(["middleware" => "jwt.auth"], function () {
    Route::post('/create/purchase', [PurchaseController::class, 'createPurchase']);
    Route::get('/purchasesall', [PurchaseController::class, 'purchasesAll']);
    Route::get('/purchasesb', [PurchaseController::class, 'purchasesB']);
});

Route::put('/updatedpurchase/{id}', [PurchaseController::class, 'updatedPurchase'])->middleware('isMaster');
Route::delete('/deletepurchase/{id}', [PurchaseController::class, 'deletePurchase'])->middleware('isMaster');