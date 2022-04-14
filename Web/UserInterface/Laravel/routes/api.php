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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [\App\Http\Controllers\UserController::class, "index"]);
Route::get('/users/{id}', [\App\Http\Controllers\UserController::class, "show"])->whereNumber('id');
Route::put('/users/{id}', [\App\Http\Controllers\UserController::class, "update"]);
Route::delete('/users/{id}', [\App\Http\Controllers\UserController::class, "destroy"]);
Route::get('/users/{id}/teammembers', [\App\Http\Controllers\UserController::class, "GetTeamMembers"]);
Route::get('/users/country', [\App\Http\Controllers\UserController::class, "GetCountryLeaderboard"]);

Route::get('/teams', [\App\Http\Controllers\TeamController::class, "index"]);
Route::get('/teams/{id}', [\App\Http\Controllers\TeamController::class, "show"]);

Route::get('tasks', [\App\Http\Controllers\TaskController::class, "index"]);
Route::post('tasks', [\App\Http\Controllers\TaskController::class, "store"]);
Route::put('tasks/{id}', [\App\Http\Controllers\TaskController::class, "update"]);

Route::get('levels', [\App\Http\Controllers\LevelController::class, "index"]);
Route::post('levels', [\App\Http\Controllers\LevelController::class, "store"]);
Route::put('levels/{id}', [\App\Http\Controllers\LevelController::class, "update"]);
