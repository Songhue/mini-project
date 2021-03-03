<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\CategoryController;

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

// User
    Route::post('/user/create', [UserController::class, 'createUser']);
//User

/* Categories */
Route::group(['prefix'=> 'categories'], function(){
    Route::get('/',              [CategoryController::class, 'getAllCategories']);
    Route::post('/',             [CategoryController::class, 'createCategory']);
});
/* Categories */

/* Post */
Route::group(['prefix'=> 'posts'], function(){
    Route::get('/',             [PostController::class, 'getAllPosts']);
    Route::get('/paging',       [PostController::class, 'getPostsByPagination']);
    Route::get('/{id}',         [PostController::class, 'getPostById']);
    Route::post('/',            [PostController::class, 'createPost']);
    Route::delete('/{id}',      [PostController::class, 'deletePost']);
});
/* Post */
