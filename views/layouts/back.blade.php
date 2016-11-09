<!-- Stored in resources/views/layouts/black.blade.php -->
<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="/revent/public/css/bootstrap.css" />
    <style type="text/css">
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
        @media (max-width: 980px) {
            /* Enable use of floated navbar text */
            .navbar-text.pull-right {
                float: none;
                padding-left: 5px;
                padding-right: 5px;
            }
        }
    </style>
</head>
<body>

@include('layouts.nav')

<div class="container-fluid">

    @include('layouts.error')
    @include('layouts.success')
    <style type="text/css">
        .sidebar-nav {
            padding: 9px 0;
        }
    </style>
    <div class="row-fluid">
        <div class="span2">
            <div class="well sidebar-nav">
                <ul class="nav nav-list">
                    <li class="nav-header">菜单列表</li>
                    <li><a href="{{ url('product') }}">产品类型</a></li>
                    <li><a href="{{ url('strategy') }}">投资策略</a></li>
                    <li><a href="{{ url('company') }}">公司总览列表</a></li>
                    <li><a href="#">公司详情列表</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                    <li><a href="#">Link</a></li>
                </ul>
            </div><!--/.well -->
        </div><!--/span-->

        <div class="span10">
            @yield('content')
        </div>
    </div>
    @include('layouts.footer')

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/revent/public/js/bootstrap.min.js"></script>
</body>
</html>