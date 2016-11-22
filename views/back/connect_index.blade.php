
@extends('layouts.back')

@section('title', '投研通讯录')

@section("content")

    <div class="row-fluid">
        <a href="{{ url('connect/add') }}">
            <button class="btn btn-primary">添加联系人</button>
        </a>
        <table class="table table-responsive">
            <caption class="page-header">投研通讯录</caption>
            <thead>
                <tr>
                    <th>序号</th>
                    <th>投研通讯录名称</th>
                    <th>人数</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>ddddddddddddddddd</th>
                    <th>ddddddddddddddddd</th>
                    <th>2343</th>
                </tr>
            </tbody>
        </table>
    </div>

@endsection