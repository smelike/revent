
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


    @if (session()->has('create_company_success'))
        <div class="alert alert-dismissable alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <ul>
                {{ session()->get('create_company_success') }}
            </ul>
        </div>
    @endif
    <form class="form-company" method="post" action="{{ url('company') }}">
        {{ csrf_field() }}
        <h3>添加公司</h3>
        <select class="form-control" name="id">
            <option>公司类别</option>
            @if(isset($types))
                @foreach($types as $type)
                <option value="{{ $type->id }}" {{ (old('id') == $type->id) ? 'selected=selected' : ''}}>{{ $type->type }}</option>
                @endforeach
            @endif
        </select>
        {{--
        @if ($errors->has('type'))
            <span class="help-block">
                <strong>{{ $errors->first('type') }}</strong>
            </span>
        @endif
        --}}
        <input type="text" name="name" class="input-block-level" placeholder="公司名称" value="{{ old('name') }}"/>
        <input type="text" name="addr" class="input-block-level" placeholder="公司地址" value="{{ old('addr') }}"/>
        <input type="text" name="manager" class="input-block-level" placeholder="对口销售/服务经理" value="{{ old('manager') }}"/>
        <input type="text" name="pay_fare" class="input-block-level" placeholder="支付佣金" value="{{ old('pay_fare') }}" />
        <div class="checkbox">
            <label>
                <input type="checkbox" name="fof" {{ old('fof') ? "checked=true": ''}}>FOF投顾池
            </label>
            <label>
                <input type="checkbox" name="new_wealth_vote" {{ old('new_wealth_vote') ? "checked=true": ''}}>新财富投票权
            </label>
        </div>
        <div class="form-group"> <!-- Message input !-->
            <textarea class="form-control" name="remark" placeholder="备注">{{ old('remark') ? old('remark') : ''}}</textarea>
        </div>

        <div class="form-group"> <!-- Submit button !-->
            <button class="btn btn-primary " name="submit" type="submit">确定</button>
        </div>
    </form>
@endsection