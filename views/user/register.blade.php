
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
        <h2 class="form-signin-heading">注册用户</h2>
        {{ csrf_field() }}
        {{-- <input type="hidden" name="csrf_token" value="{{ csrf_token() }}" /> --}}

        <input type="text" name="name" class="input-block-level" placeholder="昵称/名字" />
        <input type="text" name="email" class="input-block-level" placeholder="邮箱地址" />
        <input type="text" name="tel" class="input-block-level" placeholder="电话(可选填)" />
        <input type="password" name="pwd" class="input-block-level" placeholder="密码" />
        <input type="password" name="pwd_confirmation" class="input-block-level" placeholder="确认密码" />
        <button class="btn btn-large btn-primary" type="submit">注册</button>
    </form>

@endsection