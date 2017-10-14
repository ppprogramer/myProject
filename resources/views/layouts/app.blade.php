<!DOCTYPE html>
<html>
<head>
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="{{asset('web/plug-in/AmazeUI-2.4.2/assets/css/admin.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/plug-in/AmazeUI-2.4.2/assets/css/amazeui.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/index/hmstyle.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('web/css/basic/demo.css')}}"/>
    <script src="{{asset('web/js/basic/jquery.min.js')}}"></script>
    <script src="{{asset('web/plug-in/AmazeUI-2.4.2/assets/js/amazeui.min.js')}}"></script>
</head>
<body>
<div class="hmtop">
    @yield('header')
    @yield('content')
    @yield('footer')
</div>
</body>

<script>

</script>
@yield('script')


</html>