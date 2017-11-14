<!DOCTYPE html>
<html>
<head>
    <title>首页</title>
    <link rel="stylesheet" type="text/css" href="{{asset('web/plug/bootstrap/css/bootstrap.css')}}"/>
    <script src="{{asset('web/js/vue.js')}}"></script>
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