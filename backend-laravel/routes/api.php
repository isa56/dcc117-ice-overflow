<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CommentsController;
use App\http\Controllers\LoginController;
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


Route::middleware('auth:sanctum')->group(function () {
    
    Route::patch('posts/{id}', [PostsController::class, 'vote']);
    Route::apiResource('posts', PostsController::class);

    Route::apiResource('users', UsersController::class);
    
    Route::apiResource('comments', CommentsController::class);
});

/*
Rotas que estão dentro do middleware mas que você não quer que seja verificadas
podem ser colocadas após ele
*/

Route::post('/users', [UsersController::class, 'store']);

Route::post('/login', [LoginController::class, 'login']);


