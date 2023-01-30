<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HotelController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\UserController;
use App\Models\Hotel;
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

Route::post('/sign-up', [UserController::class, 'signUp']);
Route::post('/sign-in', [AuthController::class, 'signIn']);

Route::get('/hotels/{hotel}', [HotelController::class, 'show']);
Route::get('/hotels', [HotelController::class, 'list']);

Route::get('/services', [ServiceController::class, 'list']);

Route::group(['prefix' => '/hotels', 'middleware' => ['auth:api']], function () {
    Route::post('', [HotelController::class, 'create'])->middleware('can:create,'. Hotel::class);
    Route::put('/{hotel}', [HotelController::class, 'edit'])->middleware('can:edit,hotel');
    Route::delete('/{hotel}', [HotelController::class, 'delete'])->middleware('can:delete,hotel');
});
