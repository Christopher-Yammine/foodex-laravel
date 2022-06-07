<?php

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

use App\Http\Controllers\RestaurantsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ReviewsController;

Route::get('/AllRestos', [RestaurantsController::class, 'getAllRestos'])->name("AllRestos");
Route::post('/Login', [UsersController::class, 'login'])->name("Login");
Route::post('/AddReview', [ReviewsController::class, 'addReview'])->name("AddReview");
Route::post('/AddUser',[UsersController::class,'addUser'])->name("NewUser");
Route::post('/UpdateUser',[UsersController::class,'updateUser'])->name("UpdateUser");
Route::get('/getUnaccepted',[ReviewsController::class,'getUnaccepted'])->name("getUnaccepted");
Route::get('/getAccepted',[ReviewsController::class,'getAccepted'])->name("getAccepted");
Route::post('/acceptReview',[ReviewsController::class,'acceptReview'])->name("acceptReview");
Route::get('/getLocations',[RestaurantsController::class,'getLocations'])->name("getLocations");
Route::get('/getTypes',[RestaurantsController::class,'getTypes'])->name("getTypes");
Route::post('/addLocation',[RestaurantsController::class,'addLocation'])->name("addLocation");
Route::post('/addType',[RestaurantsController::class,'addType'])->name("addType");