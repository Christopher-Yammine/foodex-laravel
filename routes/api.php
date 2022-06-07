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