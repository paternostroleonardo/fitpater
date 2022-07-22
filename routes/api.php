<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LessonController;

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

Route::get('/lessons', [LessonController::class, 'index']);
Route::post('save-lesson', [LessonController::class, 'store']);
Route::get('/show/{lesson}', [LessonController::class, 'show']);
Route::put('edit/{lesson}', [LessonController::class, 'update']);
Route::delete('delete/{lesson}', [LessonController::class, 'destroy']);
