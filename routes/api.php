<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryContronller;
use App\Http\Controllers\MediaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


/**
 * UserProfil
 */

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});



/**
 * UserProfil
 */

Route::group([
    'middleware' => 'api',
    'prefix' => 'category'
], function ($router) {
    Route::post('/insertCategory', [CategoryContronller::class, 'insertCategory']);  
});


/**
 * Media
 */

Route::group([
    'middleware' => 'api',
    'prefix' => 'media'
], function ($route) { 
    Route::get('/category/original/{filename}', [MediaController::class, 'getMedia']); 
});
