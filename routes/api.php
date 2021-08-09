<?php

use App\Models\jsonApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonApiController;

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

Route::post('json/post', [JsonApiController::class, 'store']);
Route::get('json/get', [JsonApiController::class, 'show']);
Route::put('json/put/{id}', [JsonApiController::class, 'update']);
Route::delete('json/delete/{id}', [JsonApiController::class, 'destroy']);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
