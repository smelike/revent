
@extends('layouts.back')

@section('title', '公司详情')

@section('content')

    <div class="col-md-6">
        @if($company)
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>{{ $company->comany_name }}详情</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>类别: {{ $type->type }}</td>
                </tr>
                <tr>
                   <td>公司名称: {{ $company->company_name }}</td>
                </tr>
                <tr>
                   <td>成立日期: {{ $company->startup_date }}</td>
                </tr>
                <tr>
                   <td>基金业协会登记编号: {{ $company->industry_no }}</td>
                </tr>
                <tr>
                    <td>办公地址: {{ $company->offic_addr }}</td>
                </tr>
                <tr>
                    <td>人民币资产管理规模(亿): {{ $company->estate_scale }}</td>
                </tr>
                <tr>
                    <td>专户管理个数及规模: {{ $company->profess_count }}</td>
                </tr>
                <tr>
                    <td>阳光私募个数及规模: {{ $company->private_count }}</td>
                </tr>
                <tr>
                    <td>代表产品: {{ $company->product }}</td>
                </tr>
                <tr>
                    <td>核心人物: {{ $company->fellow }}</td>
                </tr>
                <tr>
                    <td>个人情况备注: {{ $company->fellow }}</td>
                </tr>
                <tr>
                    <td>支付佣金: {{ $company->pay_fee }}</td>
                </tr>
                <tr>
                    <td>对口销售/服务经理: {{ $company->manger }}</td>
                </tr>
                <tr>
                    <td>产品类型: {{ $product_types }}</td>
                </tr>
                <tr>
                    <td>投资策略: {{ $strategy_types }}</td>
                </tr>
                <tr>
                    <td>新财富投票权: {{ $company->new_wealth_vote ? '有' : '无'}}</td>
                </tr>
                <tr>
                    <td>FOF投顾池: {{ $company->fof ? '有' : '无'}}</td>
                </tr>
                <tr>
                    <td>个人备注: {{ $company->personal_info }}</td>
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