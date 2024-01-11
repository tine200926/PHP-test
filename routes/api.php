<?php

use App\Http\Controllers\NewsController;
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

Route::group([
    'prefix' => '/news',
], function(){
    Route::Post('/category', [NewsController::class, 'createCategory']);
    Route::Put('/category/{id}', [NewsController::class, 'updateCategory']);
    Route::Post('/category/{id}/delete', [NewsController::class, 'deleteCategory']);
    Route::Get('/category/{id}', [NewsController::class, 'getCategory']);
    Route::Get('/category', [NewsController::class, 'getAllCategories']);
});
