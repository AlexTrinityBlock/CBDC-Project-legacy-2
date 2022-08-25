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

/**
 * 登入的路由，採取路徑式參數傳遞(Path parameter)。
 * 該種方式常用於現代的RestFull API上。
 * 從資源存取的角度來看，有辦法陳述式的說明自己要的資源，如 http://首頁/圖片/花朵
 * 此處的話則是，/login/user/{使用者}/password/{密碼}
 * 
 * 下方式輸入參數的型別
 * @param string $user
 * @param string $password
 * @return \Illuminate\Http\Response
 */
Route::get('/login/user/{user}/password/{password}', function($user, $password) {
    $UserController = new UserController();
    $result = $UserController->login($user, $password);
    return $result;
});