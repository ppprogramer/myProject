<!DOCTYPE html>
<html>
<head>
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="{{asset('web/plug/bootstrap/css/bootstrap.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/plug/font-awesome/css/font-awesome.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/plug/font_481207/iconfont.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/common.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/header.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/content.css')}}"/>
    <script src="{{asset('web/js/vue.js')}}"></script>
    <script src="{{asset('web/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('web/plug/bootstrap/js/bootstrap.js')}}"></script>
</head>
<body>
@yield('header')
@yield('content')
@yield('footer')
</body>

<script>

</script>
@yield('script')


</html>