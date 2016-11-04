@extends('layouts.app')

@section('title', 'App 首页')

@section('content')
<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">
    <h1>您好!</h1>
    <p>这里是首页广告图片位置</p>
    <p><a href="#" class="btn btn-primary btn-large">详情 &raquo;</a></p>
</div>

<!-- Example row of columns -->
<div class="row">
    <div class="span4">
        <h2>精彩活动 1</h2>
        <p>活动详细内容</p>
        <p><a class="btn" href="#">点击查看 &raquo;</a></p>
    </div>
    <div class="span4">
        <h2>精彩活动 2</h2>
        <p>活动详情...</p>
        <p><a class="btn" href="#">点击查看 &raquo;</a></p>
    </div>
    <div class="span4">
        <h2>精彩活动 3</h2>
        <p>活动详情...</p>
        <p><a class="btn" href="#">点击查看 &raquo;</a></p>
    </div>
</div>

@endsection
