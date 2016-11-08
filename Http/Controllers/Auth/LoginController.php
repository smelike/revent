<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/user';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        return view('user.index');
    }
    public function login(Request $request)
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
        $user = User::where('email', $request->email)->first();

        if ($user AND ($user->password == md5($request->pwd)))
        {
            // route 后面带的必须是路由的 name
            auth()->login($user);
            return redirect($this->redirectTo);
            //return redirect()->route('backend');
        } else {
            //$request->flash('email', 'pwd');
            return back()->withInput()->with('login_fail', '账户或密码不正确');
        }
    }

    public function logout(Request $request)
    {

        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect($this->redirectTo);
    }
}
