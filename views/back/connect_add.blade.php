
@extends('layouts.back')

@section('title', '添加联系人')


@section('content')

    <div class="row-fluid">
        <p class="page-header">添加联系人到通讯录</p>
        <form class="form-group form-horizontal" method="post" action="{{ url('connect') }}">

            {{ csrf_field() }}

            @include('back.connect_basic')

        </form>
    </div>

@endsection