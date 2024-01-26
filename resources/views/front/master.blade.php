<!DOCTYPE html>
<html lang="en">

<head>
    <title>EShopper - Bootstrap Shop Template</title>
    @include('front.includes.head-css')
</head>

<body>
    <!-- Topbar Start -->
    @include('front.includes.topbar')
    <!-- Topbar End -->

    <!-- Navbar Start -->
    @include('front.includes.navbar')
    <!-- Navbar End -->
    @yield('body')
    @include('front.includes.footer')
    @include('front.includes.footer-js')


</body>

</html>
