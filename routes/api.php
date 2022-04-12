<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\PaketWisataController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Public Route
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [UserController::class, 'create']);
Route::get('paket', [PaketWisataController::class, 'allPaketWisata']);
Route::get('paket/{id}', [PaketWisataController::class, 'paketWisataByID']);

// User Route
Route::group(['middleware' => ['auth:sanctum', 'role:user']], function () {
    Route::post('user/update/{id}', [UserController::class, 'update']);
});

// Admin and Super Admin route
Route::group(['middleware' => ['auth:sanctum', 'role:super-admin,admin']], function () {
    Route::get('user', [UserController::class, 'allUser']);
    Route::delete('user/delete/{id}', [UserController::class, 'delete']);
});

// Super Admin Route
Route::group(['middleware' => ['auth:sanctum', 'role:super-admin']], function () {
    Route::post('paket/create', [PaketWisataController::class, 'create']);
    Route::put('paket/update/{id}', [PaketWisataController::class, 'update']);
    Route::delete('paket/delete/{id}', [PaketWisataController::class, 'delete']);
});
