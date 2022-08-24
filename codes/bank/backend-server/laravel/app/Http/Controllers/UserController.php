<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Cookie;

class UserController extends Controller
{
    /**
     * 根目錄
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "User API";
    }

    /**
     * 儲存資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * 展示資料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $id;
    }

    /**
     * 更新資料
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 刪除資料
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * 登入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //取得請求的使用者帳號密碼
        $name = $request->input('user');
        $password = $request->input('password');

        // 設置Cookie的儲存時間
        $cookieLifeMinutes = 60;

        // 設置Cookie
        $cookie = cookie('token', $name.$password, $cookieLifeMinutes);

        // 設置回傳內容
        $result = [
            'status' => 'success',
            'code' => '1'
        ];

        // 回應
        return response()->json($result)->cookie($cookie);
    }
    
    /**
     * 登出
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        
        // 設置Cookie的儲存時間
        $cookieLifeMinutes = 0;

        // 設置Cookie
        $cookie = cookie('token', '', $cookieLifeMinutes);

        // 設置回傳內容
        $result = [
            'status' => 'success',
            'code' => '1'
        ];

        // 回應
        return response()->json($result)->cookie($cookie);
    }
}
