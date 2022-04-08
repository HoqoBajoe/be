<?php
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login',[AuthController::class,'login']);
Route::post('user/create',[UserController::class,'create']);
Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('user',[UserController::class,'allUser']);
    Route::get('user/{id}',[UserController::class,'UserByID']);
    Route::post('user/update/{id}',[UserController::class,'update']);
    Route::delete('user/delete/{id}',[UserController::class,'delete']);
});
