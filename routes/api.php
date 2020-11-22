<?php

use App\Events\Hello;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/todo', [TestController::class, 'todo']);

Route::post('/todo-post', [TestController::class, 'todoPost']);

Route::get('/todo-update/{id}', [TestController::class, 'todoGet']);

Route::put('/todo-update/{id}', [TestController::class, 'todoUpDate']);

Route::delete('/todo-delete/{id}', [TestController::class, 'todoDelete']);
