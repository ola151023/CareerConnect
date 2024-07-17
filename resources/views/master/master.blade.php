<!DOCTYPE html>
<html>
<head>
    <title>
        @yield("title","Master")
    </title>
</head>
<body>
{{--navbar--}}
    @include('master.navbar')
{{--content--}}
    @yield('content')
{{--sidebar --}}
    @include('master.sidebar')
</body>
</html>
