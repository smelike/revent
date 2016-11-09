
@extends('layouts.back')

@section('title', '公司总览')

@section('content')

        <p>
            <a href="{{ url('company/create') }}">
                <button type="button" class="btn btn-primary">添加公司</button>
            </a>
        </p>
        <div class="col-md-6">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>序号</th>
                    <th>类别</th>
                    <th>公司名称</th>
                    <th>公司地址</th>
                </tr>
                </thead>
                <tbody>
                @if($companys)
                    @foreach($companys as $company)
                <tr>
                    <td>{{ $company->id }}</td>

                    <td>
                        @foreach($types as $type)
                            @if($type->id == $company->type_id)
                                {{ $type->type }}
                                @break
                            @endif
                        @endforeach
                    </td>
                    <td><a href="{{ url('company') }}/{{$company->id}}">{{ $company->name }}</a></td>
                    <td>{{ $company->addr }}</td>
                </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>

@endsection