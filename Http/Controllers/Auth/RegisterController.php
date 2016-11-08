<?php

namespace App\Http\Controllers\Auth;

use \App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/back';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['register']);
    }

    public function showRegistrationForm()
    {
        return view('user.register');
    }

    public function register(Request $request)
    {

        $rules = [
            'name' => 'required|alpha_dash',
            'email' => 'required|email|unique:t_user',
            'tel' => 'numeric',
            'pwd' => 'required|confirmed'
        ];
        $messages = [
            'name.required' => '名字不能为空',
            'name.dash' => '名字不能包含非法字符',
            'email.required' => '注册邮箱不能为空',
            'email.email' => '只能是邮箱',
            'email.unique' => '该邮箱账号已被注册',
            'pwd.required' => '密码不能为空',
            'pwd.confirmed' => '两次输入的密码不一致',
            'tel.numeric' => '必须是数字',
        ];

        $this->validate($request, $rules, $messages);

        if (mb_substr_count($request->get('name'), '_') > 1 || mb_substr_count($request->get('name'), '-') > 1) {
            return back()->withInput()->withErrors("name's '-' and '_' max count is 1.");
        }

        auth()->login($this->create($request));
        return redirect($this->redirectTo);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create($request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'password' => md5($request->pwd),
            //'pwd' => bcrypt($data['password']),
        ]);
    }
}
