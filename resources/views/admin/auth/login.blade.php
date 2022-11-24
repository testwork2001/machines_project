<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Log In</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" />

    <!-- Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:200,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900">

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

        * {
            font-size: 20px
        }
    </style>
</head>

<body>

    <div class="wrapper">
        <div id="pre-loader">
            <img src="{{ asset('admin/images/pre-loader/loader-01.svg') }}">
        </div>
        <section class="height-100vh d-flex align-items-center page-section-ptb login"
            style="background-image: url(images/login-bg.jpg);">
            <div class="container">
                @include('admin.layouts.errors')
                <div class="row justify-content-center no-gutters vertical-align">
                    <div class="col-lg-5 col-md-6 bg-white">
                        <div class="login-fancy pb-40 clearfix">
                            <h3 class="mb-30">تسجيل الدخول كمشرف</h3>
                            <form action="{{ route('login') }}" method="post">
                                @csrf
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="name">البريد الالكترونى * </label>
                                    <input id="name" class="web form-control" type="email"
                                        placeholder="البريد الالكترونى" name="email" value="{{ old('email') }}">
                                </div>
                                <div class="section-field mb-20">
                                    <label class="mb-10" for="Password"> كلمه المرور * </label>
                                    <input id="Password" class="password form-control" type="password"
                                        placeholder="كلمه المرور" name="password">
                                </div>
                                <div class="section-field">
                                    <div class="remember-checkbox mb-30">
                                        <div class="flex items-center justify-end mt-4">
                                            @if (Route::has('password.request'))
                                                <a class="underline text-sm text-gray-600 hover:text-gray-900"
                                                    href="{{ route('password.request') }}">
                                                    {{ __('هل نسيت كلمه السر؟') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <input type="submit" value="تسجيل الدخول" class="btn btn-success">
                                <p class="mt-20 mb-0">ليس لدي حساب؟ <a href="{{ route('register') }}"
                                        class="fs-2 text-primary">اذهب لانشاء حساب</a></p>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </section>
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

</body>

</html>
