@extends('web.layouts.main')
@section('title', ' تواصل معنا')
@section('content')

    <!-- Contact Start -->
    <div class="contact" dir="rtl">
        <div class="container">
            <div class="section-header text-center">
                <p>هل تريد مساعدة؟ </p>
                <h5>اكتب استفسارك الان وسيقوم احد خبرائنا بالتواصل معك</h5>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <h2 class="text-right">معلومات الاتصال لدينا</h2>

                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3 class="text-right">الهاتف</h3>
                                <p>01050808299</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3 class="text-right">البريد الالكترونى</h3>
                                <p>groupelghetany@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action='{{ route('help.store') }}' method="post">
                            @csrf
                            <div class="control-group">
                                <input type="text" class="form-control"placeholder="اسمك*" name="name" />
                                <p class="help-block text-danger text-right">
                                    @error('name')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" placeholder="بريدك الالكترونى *" required
                                    name="email" />
                                <p class="help-block text-danger text-right">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="control-group">
                                <input type="text" class="form-control" placeholder=" الهاتف المحمول *" required
                                    name="phone" />
                                <p class="help-block text-danger text-right">
                                    @error('phone')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" placeholder="اكتب استفسارك *" required name="message"></textarea>
                                <p class="help-block text-danger text-right">
                                    @error('message')
                                        {{ $message }}
                                    @enderror
                                </p>
                            </div>
                            <div>
                                <button class="btn btn-custom" type="submit" id="sendMessageButton">ارسال
                                    الاستفسار</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m21!1m12!1m3!1d130297.0775131961!2d31.520104915803536!3d30.88810742657829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m6!3e6!4m0!4m3!3m2!1d30.8909673!2d31.438026299999997!5e0!3m2!1sar!2seg!4v1669211053476!5m2!1sar!2seg"
                        frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
