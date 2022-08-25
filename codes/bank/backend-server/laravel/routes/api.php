<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::controller(UserController::class)->group(function () {
    Route::get('/login', 'login');
    Route::get('/logout', 'logout');
    Route::get('/checklogin', 'checklogin');
});


// Route::get('/test1', function (){
//     Cache::put('key', 'Test', $seconds = 3600);
//     $value = Cache::get('key');
//     return $value ;
// });

// Route::get('/test2', function (){
//     $value = Cache::get('key');
//     return $value ;
// });