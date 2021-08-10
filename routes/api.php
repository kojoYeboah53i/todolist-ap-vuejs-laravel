<?php

use App\Http\Controllers\ChatController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//chat
Route::get('/chat', [ChatController::class, 'index']);

Route::prefix('/chat')->group( function () {
  Route::post('/store', [ChatController::class, 'store']);
  Route::put('/{id}', [ChatController::class, 'update']);
  Route::delete('/{id}', [ChatController::class, 'destroy']);
  Route::get('/special/{id}', [ChatController::class, 'messages']);
  Route::post('/special/{id}', [ChatController::class, 'newMessage']);

  }
);
