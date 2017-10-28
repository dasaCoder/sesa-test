<html>
@include('partials.head')
@yield('head')

<body style="background-color: #f7f5f5;">
@include('partials.nav')
@yield('navbar')

    @yield('content')



@include('partials.footer')
@yield('footer')

</body>


</html>