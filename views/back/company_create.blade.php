
@extends('layouts.back')

@section('title', '添加公司简介')


@section('content')

    <style type="text/css">
        .form-company {
            max-width: 100%;
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

    </style>

    <form class="form-company form-horizontal" method="post" action="{{ url('company') }}">
        {{ csrf_field() }}
        <table class="table table-bordered">
            <thead>
                <tr><th colspan="2">公司简介</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>基本信息</td>
                    <td>
                        @include('back.company_basic_table')
                    </td>
                </tr>
                <tr>
                    <td>其他信息</td>
                    <td>
                        @include('back.company_others_table')
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="form-group"> <!-- Submit button !-->
            <button class="btn btn-primary " name="submit" type="submit">确定</button>
        </div>
    </form>
@endsection