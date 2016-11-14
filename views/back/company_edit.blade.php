
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

    @if (session()->has('edit_company_success'))
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                {{ session()->get('edit_company_success') }}
            </ul>
        </div>
    @endif
    <form class="form-company form-horizontal" method="post" action="{{ url('company') }}/{{ $company->id }}/update">
        {{ csrf_field() }}
        <h3>修改公司</h3>
        @include('back.company_basic_table')
        @include('back.company_others_table')
    </form>
@endsection