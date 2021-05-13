<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::post('/authors', [AuthorController::class, 'create']);
Route::get('/authors/{id}', [AuthorController::class, 'find']);
Route::get('/authors', [AuthorController::class, 'list']);
Route::delete('/authors/{id}', [AuthorController::class, 'delete']);
Route::put('/authors/{id}', [AuthorController::class, 'update']);

Route::post('/books', [BookController::class, 'create']);
Route::get('/books/{id}', [BookController::class, 'find']);
Route::get('/books', [BookController::class, 'list']);
Route::delete('/books/{id}', [BookController::class, 'delete']);
Route::put('/books/{id}', [BookController::class, 'update']);
