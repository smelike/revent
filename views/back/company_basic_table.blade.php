<div class="control-group">
    <label class="control-label" for="type">公司类别</label>
    <div class="controls">
        <select class="form-control span4" id="type" name="id">
            @if(isset($company_types))
                @foreach($company_types as $type)
                    <option value="{{ $type->id }}" {{ (isset($company) ? ($company->id == $type->id) : (old('id') == $type->id)) ? 'selected=selected' : ''}}>{{ $type->type }}</option>
                @endforeach
            @endif
        </select>
    </div>
</div>
<div class="control-group form-group has-error">
    <label class="control-label" for="name">公司名称</label>
    <div class="controls">
        <input type="text" name="company_name" value="{{ isset($company) ? $company->company_name : old('company_name') }}" id="name" class="input-block-level span4" placeholder="公司名称">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="date">成立日期</label>
    <div class="controls">
        <input type="text" id="date" name="startup_date" value="{{ isset($company) ? $company->startup_date : old('startup_date') }}" class="input-block-level span4" placeholder="成立日期">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="industry_no">基金业协会登记编号</label>
    <div class="controls">
        <input type="text" id="industry_no" value="{{ isset($company) ? $company->industry_no : old('industry_no') }}" name="industry_no" class="input-block-level span4" placeholder="登记编号">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="office_addr">办公地址</label>
    <div class="controls">
        <input type="text" id="office_addr" value="{{ isset($company) ? $company->office_addr : old('office_addr') }}" name="office_addr" class="input-block-level span4" placeholder="办公地址">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="estate_scale">人民币资产管理规模(亿)</label>
    <div class="controls">
        <input type="text" id="estate_scale" value="{{ isset($company) ? $company->estate_scale : old('estate_scale') }}" name="estate_scale" class="input-block-level span4" placeholder="资产管理规模">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="profess_count">专户管理个数及规模</label>
    <div class="controls">
        <input type="text" id="profess_count" value="{{ isset($company) ? $company->profess_count : old('profess_count') }}" name="profess_count" class="input-block-level span4" placeholder="专户管理个数及规模">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="private">阳光私募个数及规模</label>
    <div class="controls">
        <input type="text" id="private" value="{{ isset($company) ? $company->private_count : old('private_count') }}" name="private_count" class="input-block-level span4" placeholder="阳光私募个数及规模">
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="product">代表产品</label>
    <div class="controls">
        <textarea id="product" name="product" class="form-control span6" placeholder="代表产品">{{ isset($company) ? $company->product : old('product') }}</textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="fellow">核心人物</label>
    <div class="controls">
        <textarea id="fellow" name="fellow" class="form-control span6" placeholder="核心人物">{{isset($company) ? $company->fellow : old('fellow') }}</textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="personal_info">个人情况备注<br/>（必填：毕业院校、籍贯、历年工作机构类型、是否有小孩、生日）</label>
    <div class="controls">
        <textarea id="personal_info" name="personal_info" class="form-control span6" placeholder="个人情况备注">{{ isset($company) ? $company->personal_info : old('personal_info') }}</textarea>
    </div>
</div>