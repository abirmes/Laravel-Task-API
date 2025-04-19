<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});


Route::post('register', [UserAuthController::class, 'register']);
Route::post('login', [UserAuthController::class, 'login']);
Route::post('logout', [UserAuthController::class, 'logout'])
  ->middleware('auth:sanctum');

Route::get('/tasks', [TaskController::class, 'index']);
Route::middleware('auth:sanctum')->group(function () {
  Route::post('/tasks', [TaskController::class, 'store']);
  Route::put('/tasks/{id}', [TaskController::class, 'update']);
  Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});
