<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\PaketWisataController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Transaction\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. The
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
Route::get('review/paket/{id_paket_wisata}', [ReviewController::class, 'getReviewByPaket']);

// User Route
Route::group(['middleware' => ['auth:sanctum', 'role:user']], function () {

    // Update User
    Route::put('user/update/{id}', [UserController::class, 'updateUser']);

    // Review
    Route::post('review/paket/{id_paket_wisata}', [ReviewController::class, 'addReview']);

    // Transaction (Not Yet)
    Route::post('transaction/paket/{id_paket_wisata}', [TransactionController::class, 'createTransaction']);
    Route::get('transaction/history', [TransactionController::class, 'historyTransaction']);
});

// Admin and Super Admin route
Route::group(['middleware' => ['auth:sanctum', 'role:super-admin,admin']], function () {

    // User
    Route::get('user', [UserController::class, 'allUser']);
    Route::delete('user/delete/{id}', [UserController::class, 'delete']);

    // Review
    Route::get('review/all', [ReviewController::class, 'getAllReview']);
    Route::put('review/{id}', [ReviewController::class, 'acceptReview']);
    Route::delete('review/{id}', [ReviewController::class, 'rejectReview']);
});

// Super Admin Route
Route::group(['middleware' => ['auth:sanctum', 'role:super-admin']], function () {

    // Paket Wisata
    Route::post('paket/create', [PaketWisataController::class, 'create']);
    Route::put('paket/update/{id}', [PaketWisataController::class, 'update']);
    Route::delete('paket/delete/{id}', [PaketWisataController::class, 'delete']);

    // Admin
    Route::post('admin/create', [UserController::class, 'createAdmin']);
    Route::get('admin/all', [UserController::class, 'allAdmin']);

    // Transaction (Not Yet)
    Route::put('transaction/{id}', [TransactionController::class, 'acceptTransaction']);
    Route::delete('transaction/{id}', [TransactionController::class, 'rejectTransaction']);
});
