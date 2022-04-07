<?php
use App\Http\Controllers\API\AuthController;
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
// Route::prefix('user')->group(function(){
    
// });

Route::post('login',[AuthController::class,'login']);
Route::post('user/create',[UserController::class,'create']);
Route::group(['middleware' => 'auth:sanctum'],function(){
    Route::get('user',[UserController::class,'allUser']);
    Route::get('user/{id}',[UserController::class,'UserByID']);
    Route::post('user/update/{id}',[UserController::class,'update']);
    Route::delete('user/delete/{id}',[UserController::class,'delete']);
});

