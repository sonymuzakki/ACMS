<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

//posts
Route::apiResource('/stock', App\Http\Controllers\Api\ApiController::class)->middleware('auth:api');
// Route::post('/inventory', App\Http\Controllers\Api\ApiController::class, 'index');

Route::post('/keep', [ApiController::class, 'keep']);
// Route::apiResource('/filter', App\Http\Controllers\Api\ApiController::class)->middleware('auth:api');

Route::post('/leads-beli', [ApiController::class, 'store']);

Route::get('/search/{param}', [ApiController::class, 'search'])->middleware('auth:api');

Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
