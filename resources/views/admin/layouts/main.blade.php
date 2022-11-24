<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link href="{{ asset('web/img/logo.jpg') }}" rel="icon">
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Readex+Pro:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/style.css') }}" />
    <style>
        * {
            font-family: 'Readex Pro', sans-serif;

        }

        h1 {
            font-size: 30px;
            font-weight: 800;
        }

        h2 {
            font-size: 27px;
            font-weight: 700;
        }

        h3 {
            font-size: 26px;
            font-weight: 600;
        }

        h4 {
            font-size: 25px;
            font-weight: 500;
        }

        h5 {
            font-size: 24px;
            font-weight: 500;
        }

        h6 {
            font-size: 23px;
            font-weight: 500;
        }

        label {
            font-size: 17px
        }
    </style>
    @yield('css')

</head>

<body>

    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{ asset('admin/images/pre-loader/loader-01.svg') }}" alt="">
        </div>
        <nav class="admin-header header-dark navbar navbar-default col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <!-- logo -->
            <div class="text-left navbar-brand-wrapper">
                <a class="navbar-brand brand-logo" href="{{ route('admin') }}"><img
                        src="{{ asset('web/img/logo.jpg') }}" alt="">
                    <span class="text-white">الغيطانى</span>
                </a>

            </div>
            <!-- Top bar left -->
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a id="button-toggle" class="button-toggle-nav inline-block ml-20 pull-left"
                        href="javascript:void(0);"><i class="zmdi zmdi-menu ti-align-right"></i></a>
                </li>

            </ul>
            <!-- top bar right -->
            <ul class="nav navbar-nav ml-auto">
                <li class="nav-item fullscreen">
                    <a id="btnFullscreen" href="#" class="nav-link"><i class="ti-fullscreen"></i></a>
                </li>
                <li class="nav-item dropdown mr-30">
                    <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="true" aria-expanded="false">
                        @php
                            use Illuminate\Support\Facades\Auth;
                        @endphp
                        <img src="{{ Auth::user()->getFirstMediaUrl('admins') ? asset(Auth::user()->getFirstMediaUrl('admins')) : asset('admin/images/admin_def.webp') }}"
                            alt="avatar">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-header">
                            <div class="media">
                                <div class="media-body">
                                    <h5 class="mt-0 mb-0">{{ Illuminate\Support\Facades\Auth::user()->name }}</h5>
                                    <span>{{ Illuminate\Support\Facades\Auth::user()->email }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('profile') }}"><i
                                class="text-secondary ti-reload"></i>الصفحه الشخصيه</a>
                        <form action="{{ route('logout') }}" method="post" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item"><i class="text-danger ti-unlock"></i>تسجيل
                                الخروج</button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="side-menu-fixed light-side-menu">
                    <div class="scrollbar side-menu-bg">
                        <ul class="nav navbar-nav side-menu" id="sidebarnav" style="font-weight:600;">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard">
                                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">
                                            المنتجات والمواصفات</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="dashboard" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{ route('products.index') }}">كل المنتجات</a> </li>
                                    <li> <a href="{{ route('products.create') }}">انشاء المنتجات</a> </li>
                                    <li> <a href="{{ route('specs.index') }}">كل المواصفات</a> </li>
                                    <li> <a href="{{ route('specs.create') }}">انشاء صفه</a> </li>
                                    <li> <a href="{{ route('categories.index') }}">كل الاقسام</a> </li>
                                    <li> <a href="{{ route('categories.create') }}">انشاء  قسم</a> </li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dashboard1">
                                    <div class="pull-left"><i class="ti-home"></i><span class="right-nav-text">العملاء و
                                            الاستفسارات</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="dashboard1" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{ route('clients.index') }}">كل العملاء</a> </li>
                                    <li> <a href="{{ route('inquiries.index') }}">كل الاستفسارات</a> </li>
                                    <li> <a href="{{ route('help.index') }}">المساعدات</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#admin">
                                    <div class="pull-left"><i class="ti-home"></i><span
                                            class="right-nav-text">المشرفين</span></div>
                                    <div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="admin" class="collapse" data-parent="#sidebarnav">
                                    <li> <a href="{{ route('admins.index') }}">كل المشرفين</a> </li>
                                    <li> <a href="{{ route('admins.create') }}">انشاء مشرف جديد </a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    </div>


    <!-- jquery -->
    <script src="{{ asset('admin/js/jquery-3.3.1.min.js') }}"></script>

    <!-- plugins-jquery -->
    <script src="{{ asset('admin/js/plugins-jquery.js') }}"></script>

    <!-- plugin_path -->
    <script>
        var plugin_path = 'js/';
    </script>

    <!-- chart -->
    <script src="{{ asset('admin/js/chart-init.js') }}"></script>

    <!-- calendar -->
    <script src="{{ asset('admin/js/calendar.init.js') }}"></script>

    <!-- charts sparkline -->
    <script src="{{ asset('admin/js/sparkline.init.js') }}"></script>

    <!-- charts morris -->
    <script src="{{ asset('admin/js/morris.init.js') }}"></script>

    <!-- datepicker -->
    <script src="{{ asset('admin/js/datepicker.js') }}"></script>

    <!-- sweetalert2 -->
    <script src="{{ asset('admin/js/sweetalert2.js') }}"></script>

    <!-- toastr -->
    <script src="{{ asset('admin/js/toastr.js') }}"></script>

    <!-- validation -->
    <script src="{{ asset('admin/js/validation.js') }}"></script>

    <!-- lobilist -->
    <script src="{{ asset('admin/js/lobilist.js') }}"></script>

    <!-- custom -->
    <script src="{{ asset('admin/js/custom.js') }}"></script>
    @yield('js')

</body>

</html>
