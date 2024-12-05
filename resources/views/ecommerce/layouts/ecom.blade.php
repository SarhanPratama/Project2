<!DOCTYPE html>
<html lang="en">

<head>

  @include('ecommerce.layouts.shared.css')

</head>

<body>

    <!-- PAGE LOADING
    ================================================== -->
    <div id="preloader"></div>

    <!-- MAIN WRAPPER
    ================================================== -->
    <div class="main-wrapper mp-pusher" id="mp-pusher">

        <!-- HEADER
        ================================================== -->
            @include('ecommerce.layouts.shared.header')

        <!--CONTENT
        ================================================== -->
            @yield('content')

        <!-- FOOTER
        ================================================== -->
            @include('ecommerce.layouts.shared.footer')

    </div>

    <!-- SCROLL TO TOP
    ================================================== -->
    <a href="#" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

    @include('ecommerce.layouts.shared.js')

    {{-- @include('ecommerce.layouts.shared.alert') --}}

</body>

</html>
