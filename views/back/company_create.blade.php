
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

    <form class="form-company" method="post" action="{{ url('company') }}">
        {{ csrf_field() }}
        <table class="table">
            <thead>
                <tr><th colspan="2">公司简介</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>基本信息</td>
                    <td>
                        <table class="table table-borded">
                            <tr>
                                <td style="width: 50px;">公司类别</td>
                                <td>
                                    <select class="form-control" name="id">
                                        <option>公司类别</option>
                                        @if(isset($types))
                                            @foreach($types as $type)
                                                <option value="{{ $type->id }}" {{ (old('id') == $type->id) ? 'selected=selected' : ''}}>{{ $type->type }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>公司名称</td>
                                <td><input  class="input-block-level"  type="text" /></td>
                            </tr>
                            <tr>
                                <td>成立日期</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td>基金业协会登记编号</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td>人民币资产管理规模(亿元)</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td>专户管理个数及规模</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td>阳光私募个数及规模</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td>代表产品</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td>核心人物</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td style="width: 50px;word-break: break-all;">
                                    个人情况备注<br/>（必填：毕业院校、籍贯、历年工作机构类型、是否有小孩、生日）
                                </td>
                                <td>
                                    <textarea class="form-control span10" name="remark" placeholder="备注">{{ old('remark') ? old('remark') : ''}}</textarea>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>其他信息</td>
                    <td>
                        <table class="table table-borded">
                            <tr>
                                <td style="width: 50px;">支付佣金</td>
                                <td>
                                    <input type="text" name="pay_fare" class="input-block-level" placeholder="支付佣金" value="{{ old('pay_fare') }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>对口销售/服务经理</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td>新财富投票权</td>
                                <td><input  class="input-block-level" type="text" /></td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>
                                        <input type="checkbox" name="fof" {{ old('fof') ? "checked=true": ''}}>FOF投顾池
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <label>
                                        <input type="checkbox" name="new_wealth_vote" {{ old('new_wealth_vote') ? "checked=true": ''}}>新财富投票权
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table>
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