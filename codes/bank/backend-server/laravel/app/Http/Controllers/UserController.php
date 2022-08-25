<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Cookie;


class UserController extends Controller
{

    /**
     * 登入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = $request->input('user');
        $password = $request->input('password');
        $uuid = Str::uuid();

        Cache::put($uuid, 'logined' , $seconds = 3600);
        $cookie = cookie('token', $uuid, $minutes = 60);


        // 設置回傳內容
        $result = [
            'status' => 'success',
            'code' => '1',
            'token' => $uuid,
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
        $token = $request->cookie('token');
        Cache::put($token, '', 0);
        Cache::forget($token);
        $cookie = cookie('token', '', $minutes = 0);

        // 設置回傳內容
        $result = [
            'status' => 'success',
            'code' => '1'
        ];

        // 回應
        return response()->json($result)->cookie($cookie);
    }

    /**
     * 確認登入
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checklogin(Request $request)
    {
        $resul = [];

        $token = $request->cookie('token');

        if($token == null){
            $token = $request->input('token');
        }

        $tokenInCache = Cache::get($token);

        if ($tokenInCache == 'logined'){

            // 設置回傳內容
            $result = [
                'status' => 'Logined',
                'code' => '1',
                'token' => $request->input('token')
            ];

        }else{
            
            // 設置回傳內容
            $result = [
                'status' => 'Not Logined',
                'code' => '0',
                'token' => $request->input('token')
            ];

        }



        // 回應
        return response()->json($result);
    }
}
