<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
<body>
<div class="wrapper">
{{--    <!-- HTML preloader -->--}}
{{--    <div id="preloader">--}}
{{--        <div id="status"></div>--}}
{{--    </div>--}}

    <!-- Start Of Header Section -->
    <header>
        @include('layout.header')
    </header>
    <!-- End Of Header Section -->
    <!-- Start Of Page Content -->
    <div class="page-content">
        @yield('content')
    </div>
    <footer class="blue-bg">
        @include('layout.footer')
    </footer>
    <!-- End Of footer Section -->
    <!-- Start Of Back To Top Section -->
    <div class="back-to-top-box">
        <a id="back-to-top" href="#" class="back-to-top bounce"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
    </div>
    <!-- End Of Back To Top Section -->
</div>
<script src="{{ mix('assets/js/app.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
