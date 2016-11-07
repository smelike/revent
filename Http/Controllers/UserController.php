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
            'pwd' => 'required|confirmed',
            'pwd_confirmation' => 'required'
        ];
        $messages = [
            'email.required' => '注册邮箱不能为空',
            'email.email' => '只能是邮箱',
            'email.unique' => '该邮箱账号已被注册',
            'pwd.required' => '密码不能为空',
            'pwd_confirmation.required' => '确认密码不能为空',
            'pwd.confirmed' => '两次输入的密码不一致',
            'tel.numeric' => '必须是数字',
        ];
        $this->validate($request, $rules, $messages);
    }
    public function store(Request $request)
    {
        $this->registerRules($request);

        $user = new User;
        $user->email = $request->email;
        $user->password = md5($request->pwd);
        if ($user->save()) {
            return redirect('user');
        }
    }
    public function login(Request $request)
    {
        $this->loginRules($request);
        $user = User::where('email', $request->email)->first();

        if ($user AND ($user->password == md5($request->pwd)))
        {
            // route 后面带的必须是路由的 name
            auth()->login($user);
            return redirect()->route('backend');
        } else {
            //$request->flash('email', 'pwd');
            return back()->withInput()->with('login_fail', '账户或密码不正确');
        }
    }
    public function show()
    {
        return view('user.register');
    }
}