<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\JoinController;

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

// Category
Route::get('category', [CategoryController::class, 'readAll']);
Route::get('only_category', [CategoryController::class, 'readOnlyCategory']);
Route::get('/category/{category}', [CategoryController::class, 'readCategory']);

// User
Route::get('user', [UserController::class, 'readAll']);
Route::get('/user/{id}', [UserController::class, 'readId']);
Route::get('/user/{email}/{password}', [UserController::class, 'readUser']);
Route::post('user', [UserController::class, 'create']);
Route::put('/user/{id}', [UserController::class, 'update']);

// Recipe
Route::get('recipe', [RecipeController::class, 'readAll']);
Route::get('/recipe/{isSaved}', [RecipeController::class, 'readBasedBookmark']);
Route::get('/recipe_creator/{creator}', [RecipeController::class, 'readBasedCreator']);
Route::post('recipe', [RecipeController::class, 'create']);
Route::delete('recipe/{id}', [RecipeController::class, 'delete']);
Route::put('/update_recipe/{id}', [RecipeController::class, 'update']);

Route::get('/join/{category}', [RecipeController::class, 'readBasedCategory']);
Route::get('join', [RecipeController::class, 'selectCategory']);


