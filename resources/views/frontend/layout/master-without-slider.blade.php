<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @include('frontend.partial.style')
    <title>@yield('title')</title>

</head>

<body>

 {{-- navbar --}}

 @include('frontend.partial.header')


    <!-- slider section start -->
    @include('frontend.partial.slider')
    <!-- slider section end -->

    @yield('frontend-content')
    <!-- client logo slider -->

    <!-- Footer -->
    @include('frontend.partial.footer')

    <!-- Optional JavaScript -->

    @include('frontend.partial.scripts')
</body>

</html>