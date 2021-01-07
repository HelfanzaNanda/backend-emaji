<?php

use App\Http\Controllers\Api\Admin\{TaskController, UserController, ToolController};
use App\Http\Controllers\Api\Auth\LoginController;
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

Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');

Route::prefix('admin')->group(function() {

    Route::prefix('tool')->group(function() {
        Route::get('', [ToolController::class, 'index']);
        Route::post('', [ToolController::class, 'store']);
        Route::get('{tool:slug}', [ToolController::class, 'show']);
        Route::put('{tool:slug}', [ToolController::class, 'update']);
        Route::delete('{tool:slug}', [ToolController::class, 'delete']);
    });

    Route::prefix('task')->group(function() {
        Route::get('', [TaskController::class, 'index']);
        Route::post('', [TaskController::class, 'store']);
        Route::get('{task:id}', [TaskController::class, 'show']);
        Route::put('{task:id}', [TaskController::class, 'update']);
        Route::delete('{task:id}', [TaskController::class, 'delete']);
    });

    Route::prefix('user')->group(function() {
        Route::get('', [UserController::class, 'index']);
        Route::post('', [UserController::class, 'store']);
        Route::get('{user:id}', [UserController::class, 'show']);
        Route::put('{user:id}', [UserController::class, 'update']);
        Route::delete('{user:id}', [UserController::class, 'delete']);
    });
});


