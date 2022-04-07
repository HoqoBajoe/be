<?php

use App\Http\Controllers\API\UserController;
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

// Route::resource('user',UserController::class);
Route::prefix('user')->group(function(){
    Route::get('',[UserController::class,'allUser']);
    Route::get('/{id}',[UserController::class,'UserByID']);
    Route::post('/create',[UserController::class,'create']);
    Route::post('/update/{id}',[UserController::class,'update']);
    Route::delete('/delete/{id}',[UserController::class,'delete']);
});