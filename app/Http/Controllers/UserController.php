<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 11/4/16
 * Time: 5:51 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function login(Request $request)
    {
        $rules = [
            'account' => 'required|alpha_num',
            'pwd' => 'required'
        ];
        $messages = [
            'account.required' => '登陆账号不能为空',
            'account.alpha_num' => '登陆账号包含有非法字符',
            'pwd.required' => '密码不能为空',
        ];
        $this->validate($request, $rules, $messages);
        dd($request->all());
    }
}