<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>verify Email</title>

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
            <img src="{{asset('admin/images/pre-loader/loader-01.svg')}}" alt="">
        </div>

        <section class="lockscreen height-100vh page-section-ptb parallax"
            style="background: url({{ asset('admin/images/login-bg.jpg') }});">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-lg-5 col-md-8 col-sm-8 align-self-center">
                        <div class="card text-center py-3 bg-white clearfix" style="font-size: 20px">

                            <div class="mb-4 text-sm text-gray-600">
                                {{ __('اضغط على زر ارسال لارسال رابط التحقق من البريد الالكترونى') }}
                            </div>

                            @if (session('status') == 'verification-link-sent')
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ __('تم إرسال رابط تحقق جديد إلى عنوان البريد الإلكتروني الذي قدمته أثناء التسجيل.') }}
                                </div>
                            @endif

                            <div class="mt-4 flex items-center justify-between">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div>
                                        <button class="btn btn-success" type="submit">
                                            {{ __('ارسال') }}

                                        </button>

                                    </div>
                                </form>


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--=================================
 lockscreen-->

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
