<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 11/4/16
 * Time: 5:51 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index');
    }

    private function loginRules($request)
    {
        $rules = [
            'email' => 'required|email',
            'pwd' => 'required'
        ];
        $messages = [
            'email.required' => '邮箱地址不能为空',
            'email.email' => '请输入正确的邮箱地址',
            'pwd.required' => '密码不能为空',
        ];
        $this->validate($request, $rules, $messages);
    }
    private function registerRules($request) {
        $rules = [
            'email' => 'required|email|unique:t_user',
            'tel' => 'numeric',
            'pwd' => 'required|confirmed'
        ];
        $messages = [
            'email.required' => '注册邮箱不能为空',
            'email.email' => '只能是邮箱',
            'email.unique' => '该邮箱账号已被注册',
            'pwd.required' => '密码不能为空',
            'pwd.confirmed' => '两次输入的密码不一致',
            'tel.numeric' => '必须是数字',
        ];
        $this->validate($request, $rules, $messages);
    }
    public function store(Request $request)
    {
        $this->registerRules($request);
        $return = User::create([
                'email' => $request->email,
                'password' => $request->pwd,
        ]);
        if ($return) {

            return redirect('user');
        }
    }

    public function show()
    {

    }
}