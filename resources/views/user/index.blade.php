
    @extends('layouts.app')

    @section('title', '用户登陆')

    @section('sidebar')
           @parent
        <p>This is appended to the master sidebar.</p>
    @endsection

    @section('content')

        <style type="text/css">
            .form-signin {
                max-width: 300px;
                padding: 19px 29px 29px;
                margin: 0 auto 20px;
                background-color: #fff;
                border: 1px solid #e5e5e5;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px;
                -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
            }
            .form-signin .form-signin-heading,
            .form-signin .checkbox {
                margin-bottom: 10px;
            }
            .form-signin input[type="text"],
            .form-signin input[type="password"] {
                font-size: 16px;
                height: auto;
                margin-bottom: 15px;
                padding: 7px 9px;
            }
        </style>

        <form class="form-signin" method="post" action="{{ url('user') }}">
            <h2 class="form-signin-heading">用户登陆</h2>
            {{ csrf_field() }}
            {{-- <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" /> --}}
            <input type="text" name="account" class="input-block-level" placeholder="邮箱地址">
            <input type="password" name="pwd" class="input-block-level" placeholder="请输入密码">
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> 记住密码
            </label>

            <button class="btn btn-large btn-primary" type="submit">登陆</button>
        </form>

    @endsection