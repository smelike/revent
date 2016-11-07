<!-- Stored in resources/views/layouts/black.blade.php -->

<html>
<head>
    <title>App Name - @yield('title')</title>
    <link rel="stylesheet" href="/revent/public/css/bootstrap.css" />
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>

@include('layouts.nav')

<div class="container-fluid">

    @include('layouts.error')
    @yield('content')
    @include('layouts.footer')

</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="/revent/public/js/bootstrap.min.js"></script>
</body>
</html>