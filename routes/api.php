<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\LoginController;
use App\Http\Controllers\api\v1\UserController;
use App\Http\Controllers\api\v1\RegisterController;
use App\Http\Controllers\api\v1\BikeController;
use App\Http\Controllers\api\v1\NewLoginController;
use App\Http\Controllers\api\v1\BikeCategoryController;
use App\Http\Controllers\api\v1\LandingPageController;
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

Route::middleware('auth:sanctum')->get('/authenticated', function () {
    return true;
});

 //UserLogin Routes Api

/* Route::prefix('/user')-group(function(){
    Route::post('/login', 'api/v1/LoginController@login');
 }); */

 //Route::get('/quiz', [QuizController::class, 'index']);



//User Controller data api
Route::prefix('/user')->group(function () {
    //User Controller
    Route::get('/all', [UserController::class, 'index']);
    Route::post('/store', [UserController::class, 'store']);
    Route::put('/{id}', [UserController::class, 'update']);
    Route::delete('/{id}', [UserController::class, 'destroy']);

    //Login & Register Controllers
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
});

  
//Bike Controller data api
Route::prefix('/bike')->group(function () {
    //User Controller
    Route::get('/all', [BikeController::class, 'index']);
    Route::post('/upload', [BikeController::class, 'handle']);
    Route::post('/store', [BikeController::class, 'store']);
    Route::post('/update/{id}', [BikeController::class, 'update']);
    Route::delete('/{id}', [BikeController::class, 'destroy']);
});


//BikeCategory Controller data api
Route::prefix('/category')->group(function () {
    //User Controller
    Route::get('/all', [BikeCategoryController::class, 'index']);
    Route::post('/store', [BikeCategoryController::class, 'store']);
    Route::post('/update/{id}', [BikeCategoryController::class, 'update']);
    Route::delete('/{id}', [BikeCategoryController::class, 'destroy']);
});


//landingpage Controller data api
Route::prefix('/page')->group(function () {
    //User Controller
    Route::get('/all', [LandingPageController::class, 'index']);
    Route::get('/sample', [LandingPageController::class, 'sample']);
    
    Route::get('/search/{id}', [LandingPageController::class, 'show']);
    Route::post('/update/{id}', [BikeCategoryController::class, 'update']);
    Route::delete('/{id}', [BikeCategoryController::class, 'destroy']);
});


  Route::post('/logout', [LoginController::class, 'logout']);

 //




