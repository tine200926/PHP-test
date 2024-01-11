<?php

//use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [\App\Http\Controllers\UserController::class , 'test']);


Route::get('/greeting', function () {
    return 'Hello World';
});

Route::get('/greeting/{id}/{sss}', function ($id, $sss) {
    return 'Hello World '.$id.$sss;
});


Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        return "users";
    });

    Route::get('/store', function () {
        return "store";
    });


});
