<div class="control-group">
    <label class="control-label" for="pay_fee">支付佣金</label>
    <div class="controls">
        <input type="text" id="pay_fee" name="pay_fee" value="{{ isset($company) ? $company->pay_fee : old('pay_fee') }}" class="input-block-level span4" placeholder="支付佣金">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="manager">对口销售/服务经理</label>
    <div class="controls">
        <input type="text" id="manager" name="manager" class="input-block-level span4" value="{{ isset($company) ? $company->manager : old('manager') }}" placeholder="对口销售/服务经理">
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="product_type">产品类型(可多选)</label>
    <div class="controls">
        <select class="form-control span4" id="product_type" name="product_type[]" multiple="multiple">
            @if(isset($product_types))
                @foreach($product_types as $type)
                    @if(isset($company))
                        @if(is_array($company->product_type) AND in_array($type->id, $company->product_type))
                                <option value="{{$type->id}}" selected="selected">{{ $type->name }}</option>
                            @else
                                <option value="{{$type->id}}">{{ $type->name }}</option>
                            @endif
                    @else
                        @if(is_array(old('product_type')) AND in_array($type->id, old('product_type')))
                            <option value="{{$type->id}}" selected="selected">{{ $type->name }}</option>
                        @else
                            <option value="{{$type->id}}">{{ $type->name }}</option>
                        @endif
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="invest_strategy">投资策略(可多选)</label>
    <div class="controls">
        <select class="form-control span4" id="invest_strategy" name="invest_strategy[]" multiple="multiple">
            @if(isset($strategy_types))
                @foreach($strategy_types as $type)
                    @if(isset($company))
                        @if(is_array($company->invest_strategy) AND in_array($type->id, $company->invest_strategy))
                            <option value="{{$type->id}}" selected="selected">{{ $type->name }}</option>
                        @else
                            <option value="{{$type->id}}">{{ $type->name }}</option>
                        @endif
                    @else
                        @if(is_array(old('invest_strategy')) AND in_array($type->id, old('invest_strategy')))
                            <option value="{{$type->id}}" selected="selected">{{ $type->name }}</option>
                        @else
                            <option value="{{$type->id}}">{{ $type->name }}</option>
                        @endif
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="new_weath_vote">
        <input type="checkbox" id="new_weath_vote" name="new_weath_vote" {{isset($company) ? ($company->new_weath_vote ? "checked" : "") : (old("new_weath_vote") ? "checked" : "") }}> 新财富投票权
    </label>
    <label class="control-label" for="fof">
        <input type="checkbox" id="fof" name="fof" {{isset($company) ? ($company->fof ? "checked" : "") : (old("fof") ? "checked" : "") }}> FOF投顾池
    </label>
</div>