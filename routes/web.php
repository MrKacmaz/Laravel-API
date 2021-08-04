<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard', [ClientController::class, 'show'])->middleware(['auth'])->name('dashboard');


require __DIR__ . '/auth.php';



Route::post('/addUser', [ClientController::class, 'store']);
Route::post('/deleteUser/{id}', [ClientController::class, 'destroy']);

Route::get('/successfullyAdded', [ClientController::class, 'show']);
Route::get('/successfullyUpdated', [ClientController::class, 'show']);
Route::get('/deletedSuccessfully', [ClientController::class, 'show']);
