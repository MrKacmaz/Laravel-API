<?php

use App\Models\jsonApi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonApiController;
use App\Http\Middleware\JsonApi as MiddlewareJsonApi;

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

Route::get('contacts', [JsonApiController::class, 'show'])->middleware(MiddlewareJsonApi::class);

Route::post('contact', [JsonApiController::class, 'store'])->middleware(MiddlewareJsonApi::class);
Route::put('contact', [JsonApiController::class, 'update'])->middleware(MiddlewareJsonApi::class);
Route::delete('contact', [JsonApiController::class, 'destroy'])->middleware(MiddlewareJsonApi::class);


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
