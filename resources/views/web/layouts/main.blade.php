<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta
        content="تصنيع مكينات الرخام والجرانيت صناعه مصريه بواصفات ايطاليه عوض الغيطانى واولاده مصر محافظه الدقهليه السنبلاوين"
        name="keywords">
    <meta content="شركه اولاد الغيطانى لتصنيع مكينات الرخام والجرانيت" name="description">

    <!-- Favicon -->
    <link href="{{ asset('web/img/logo.jpg') }}" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="{{ asset('web/lib/flaticon/font/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('web/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('web/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('web/css/style.css') }}" rel="stylesheet">
    <style>
        .whatsapp-icon {
            position: fixed;
            bottom: 106px;
            right: 20px;
            width: 100px;
            z-index: 9999999;
        }

        .whatsapp-icon img {
            border-radius: 20px;
        }

        @media (max-width:991px) {
            .whatsapp-icon  {
                display: none;
            }
        }
    </style>
    @yield('css')
</head>

<body>
    <div style="overflow: hidden">
        <!-- Top Bar Start -->
        <div class="col-12 text-center" dir="rtl" style="position: fixed ;top:0; right:0 ;z-index:88882">
            @include('web.layouts.errors')

        </div>

        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="nav-bar">
            <div class="container" dir="rtl">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a class="navbar-brand" href="{{ route('home') }}" style="width:60px">
                        <img src="{{ asset('web/img/logo.jpg') }}" alt="Logo" class="w-100 rounded-circle">
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-center align-items-center "
                        id="navbarCollapse">
                        <div class="navbar-nav text-right">
                            <a href="{{ route('home') }}" style="width:70px" class="d-none d-lg-block">
                                <img src="{{ asset('web/img/logo.jpg') }}" alt="Logo" class="w-100 rounded-circle">
                            </a>
                            <a href="{{ route('home') }}"
                                class="nav-item nav-link @if (Request::is('/')) active @endif text-center ">
                                الصفحه الرئسيه </a>
                            <div class="nav-item dropdown text-center @if (Request::is('services')) active @endif">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown">المنتجات</a>
                                <div class="dropdown-menu text-center"
                                    style="right: 44px;
                                               font-size:20px;
                                               background:#E81C2E;
                                               border-radius:10px;    
                                               margin:auto;
                                               width:fit-content
                                            ">
                                    @foreach ($categories as $category)
                                        <a href="{{ route('products', $category->slug) }}"
                                            class="dropdown-item products-link"
                                            style=" color:white ">{{ $category->name }}</a>
                                    @endforeach

                                </div>
                            </div>
                            <a href="{{ route('about') }}"
                                class="nav-item nav-link @if (Request::is('aboutus')) active @endif text-center">
                                من
                                نحن</a>
                            <a href="{{ route('contact') }}" class="nav-item nav-link  text-center">تواصل معنا</a>


                        </div>

                    </div>
                </nav>
            </div>
        </div>
        <!-- Nav Bar End -->
        @yield('content')

        <div class="whatsapp-icon text-right" dir="rtl">
            <a href="https://web.whatsapp.com/send?phone=01005762305" target="_blank"><img
                    src="{{ asset('web/img/whatsapp.png') }}" alt="" class="w-100 bg-light"></a>
        </div>
        <!-- Footer Start -->
        <div class="footer" dir="rtl">
            <div class="container text-right">
                <div class="row justify-content-center text-center">
                    <div class=" col-md-6 col-11">
                        <div class="footer-contact">
                            <h2>معلومات الاتصال لدينا</h2>
                            <p><i class="fa fa-map-marker-alt"></i>عزبة الربوات، نوب طريف، مركز السنبلاوين، الدقهلية</p>
                            <p><i class="fa fa-phone-alt"></i>01050808299</p>
                            <p><i class="fa fa-envelope"></i>groupelghetany@gmail.com</p>
                            <div class="footer-social">
                                <a class="btn" href="https://www.facebook.com/getany1975?mibextid=zbwkwL"
                                    target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a class="btn" href="https://www.instagram.com/alghetany_sons/" target="_blank"><i
                                        class="fab fa-instagram"></i></a>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container copyright">
                <p><bdi>&copy; <a href="https://www.facebook.com/getany1975?mibextid=zbwkwL">الغيطانى</a>, جميع الحقوق
                        محفوظه. Devloped By <a href="https://www.facebook.com/fikrahshow">Fekra Show</a></bdi></p>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Back to top button -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>

    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('web/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('web/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('web/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('web/lib/counterup/counterup.min.js') }}"></script>

    <!-- Contact Javascript File -->
    <script src="{{ asset('web/mail/jqBootstrapValidation.min.js') }}"></script>
    <script src="{{ asset('web/mail/contact.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('web/js/main.js') }}"></script>
    @yield('js')
</body>

</html>
