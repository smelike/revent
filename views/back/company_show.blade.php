
@extends('layouts.back')

@section('title', '公司详情')

@section('content')

    <div class="col-md-6">
        @if($company)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{{ $company->name }}详情</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>类别: {{ $type->type }}</td>
                </tr>
                <tr>
                   <td>公司名称: {{ $company->name }}</td>
                </tr>
                <tr>
                    <td>公司地址: {{ $company->addr }}</td>
                </tr>
                <tr>
                    <td>对口销售/服务经理: {{ $company->addr }}</td>
                </tr>
                <tr>
                    <td>支付佣金: {{ $company->pay_fare }}</td>
                </tr>
                <tr>
                    <td>新财富投票权: {{ $company->new_wealth_vote ? '有' : '无'}}</td>
                </tr>
                <tr>
                    <td>FOF投顾池: {{ $company->fof ? '有' : '无'}}</td>
                </tr>
                <tr>
                    <td>备注: {{ $company->remark }}</td>
                </tr>

                <tr>
                    <td>
                        <a href="{{ url('company') }}/{{ $company->id }}/edit">
                            <button type="button" class="btn btn-primary">修改</button>
                        </a>
                        <a href="{{ url('company/') }}/{{ $company->id }}/del">
                            <button type="button" class="btn btn-warning">删除</button>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        @else
            <div class="alert alert-danger" role="alert">
                <strong>该公司不存在!</strong> 具体原因, 请咨询管理人员.
            </div>
        @endif
    </div>

@endsection