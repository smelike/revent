
@extends('layouts.back')

@section('title', '投资策略')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body span3">
            <form class="form-inline" role="form" method="POST" action="{{ url('strategy') }}">
                {{ csrf_field() }}
                <div class="input-append">
                    <input type="text" name="name" class="input-block-level" placeholder="投资策略名称" value="{{ old('name') }}"/>
                    <button class="btn btn-primary " name="submit" type="submit">确定添加</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row-fluid">
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>投资策略列表</caption>
                <thead>
                <tr>
                    <th>#</th>
                    <th>名称</th>
                    <td>操作</th>
                </tr>
                </thead>
                <tbody>
                @if($strategys)
                    @foreach($strategys as $key => $strategy)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $strategy->name }}</td>
                            <td><a href="{{ url('strategy') }}/{{ $strategy->id }}/del">删除</a></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="2">产品类型为空</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

@endsection

