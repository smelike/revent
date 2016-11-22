<div class="control-group">
    <label class="control-label" for="company_id">所属公司</label>
    <div class="controls">
        <select class="form-control span4" id="company_id" name="company_id">
            @if($companys)
                @foreach($companys as $company)
                    @if(isset($connect) AND ($connect->company_id == $company->id))
                        <option value="{{ $company->id }}" selected="selected">{{ $company->company_name }}</option>
                    @elseif($company->id == old('company_id'))
                        <option value="{{ $company->id }}" selected="selected">{{ $company->company_name }}</option>
                    @else
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endif
                @endforeach
            @endif
        </select>
    </div>
</div>

<div class="control-group">
    <label class="control-label" for="name">人员姓名</label>
    <div class="controls">
        <input type="text" id="name" class="input-block-level span4" name="name" placeholder="人员姓名" value="{{ isset($connect) ? $connect->name : old('name')}}"/>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="duty">公司职务</label>
    <div class="controls">
        <input type="text" id="duty" class="input-block-level span4" name="duty" placeholder="公司职务" value="{{ isset($connect) ? $connect->duty : old('duty') }}" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="landline_tel">固定电话</label>
    <div class="controls">
        <input type="text" id="landline_tel" class="input-block-level span4" placeholder="固定电话" name="landline_tel" value="{{ isset($connect) ? $connect->landline_tel : old('landline_tel') }}" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="mobile">手机号码</label>
    <div class="controls">
        <input type="text" id="mobile" class="input-block-level span4" placeholder="手机号码"  name="mobile" value="{{ isset($connect) ? $connect->mobile : old('mobile') }}" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="email">邮箱</label>
    <div class="controls">
        <input type="text" id="email" class="input-block-level span4" placeholder="邮箱" name="email" value="{{ isset($connect) ? $connect->email : old('email') }}" />
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="name">覆盖行业</label>
    <div class="controls">
        <textarea id="product" name="covers" class="form-control span6" placeholder="覆盖行业">{{ isset($connect) ? $connect->covers : old('covers') }}</textarea>
    </div>
</div>
<div class="control-group">
    <label class="control-label" for="focus">关注点</label>
    <div class="controls">
        <textarea id="product" name="focus" class="form-control span6" placeholder="关注点">{{ isset($connect) ? $connect->covers : old('focus') }}</textarea>
    </div>
</div>

<div class="form-group">
    <button class="btn btn-primary" type="submit">确定</button>
</div>