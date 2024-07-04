<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    @include('adminTheme.style')
    @yield('style')

</head>

<body>

    <!-- ======= Header ======= -->
    @include('adminTheme.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('adminTheme.sidebar')
    <!-- End Sidebar-->

    <!-- Content -->
    @yield('content')
    <!-- End Content -->

    <!-- ======= Footer ======= -->
    @include('adminTheme.footer')
    <!-- End Footer -->

    @include('adminTheme.script')
    @yield('script')

</body>

</html>