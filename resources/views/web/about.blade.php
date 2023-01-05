@extends('web.layouts.main')
@section('title', 'اعرف عنا')
@section('content')
    <!-- About Start -->
    <div class="about" dir="rtl">
        <div class="container bg-light rounded p-2">
            <div class="row align-items-center align-items-center">

                <div class="col-12">
                    <div class="section-header text-center">
                        <p>من نحن</p>
                        <h2>شركة الغيطانى لتصنيع ماكينات الرخام والأوناش</h2>
                    </div>
                    <div class="about-content text-center">
                        <p>
                            الشركة التي تأسست في عام 2008 في جمهورية مصر العربية وتحديدًا في البقلية - طريق المنصورة
                            السنبلاوين، هي الآن أحد أكثر الشركات المحترفة في مجال تصنيع مكن الرخام والجرانيت و الاوناش في
                            الجمهورية،
                            حيث تستطيع الشركة الغيطانى لتصنيع ماكينات الرخام والجرانيت تقديم خدماتها عالية الجودة لكافة
                            العملاء بفضل فريق العمل المحترف المكون من مصممين وفنيين قادرين على تنفيذ احدث ماكينات الرخام
                            والجرانيت و الاوناش بالمواصفات التي يرغب العملاء في الحصول عليها وفقًا للأغراض المفترض أنهم
                            يخططون
                            لاستخدامها لها.
                        </p>
                    </div>
                    <div class="about-content text-center my-3">
                        <h3 class="text-danger">كيف تساعدك شركة الغيطانى لتصنيع ماكينات الرخام والجرانيت في إطلاق وتطوير مشروعك؟</h3>
                        <p class="my-5">
                            توفر شركة الغيطانى احدث ماكينات الرخام والجرانيت سواءً ماكينات تقطيع الرخام والجرانيت (
                            ماكينة قص الرخام والجرانيت ) أو جلايات الرخام والجرانيت والمسؤولة عن تلميع الرخام والجرانيت قبل
                            تقديمه في صورة سلعة قابلة للاستهلاك التجاري. وهو ما يُساعد أصحاب المصانع والورش في تطوير أعمالهم
                            الحالية بصورة ملحوظة أو البدء بمعدات ممتازة تساعدهم على المنافسة في السوق بأفضل جودة ممكنة.
                        </p>

                        <p class="my-5">
                            ويعد أبرز ما يجعل شركه الغيطانى لتصنيع ماكينات الرخام والجرانيت خيار مميز بالنسبة للعملاء
                            الذين يستهدفون الحصول على ماكينات تقطيع الرخام والجرانيت ليس فقط كونها تقدم احدث ماكينات الرخام
                            والجرانيت بل لتواجد فريق عمل لديه باع كبير جدًا عمل على صنع العشرات من ماكينات قص الرخام
                            والجرانيت وجلايات الرخام والجرانيت، والذي يعمل على تصميم المعدات بجودة عالية وايضًا تقديم النصح
                            والإرشادات للعملاء.
                        </p>
                        <p class="my-5">
                            وفضلاً عن هذا وذاك فإن شركه الغيطانى  تقدم اسعار منافسة جدًا لـ ماكينة قص الرخام والجرانيت
                            وماكينة تلميع الرخام والجرانيت، مقارنةً بالمنافسين من حيث مقارنة الجودة والنتائج بالأسعار والتي
                            ستنتج في النهاية قيمة أفضل لـ ماكينات تقطيع الرخام والجرانيت التي تقدمها الشركة.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Contact Start -->
    <div class="contact" dir="rtl">
        <div class="container">
            <div class="section-header text-center">
                <p>هل تريد مساعدة؟ </p>
                <h5>اكتب استفسارك الان وسيقوم احد خبرائنا بالتواصل معك</h5>
            </div>
            <div class="row">
                <div class="col-lg-5">
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
                <div class="col-lg-6">
                    <div class="contact-form">
                        <div id="success"></div>
                        <form action='{{ route('help.store') }}' method="post">
                            @csrf
                            <div class="control-group">
                                <input type="text" class="form-control"placeholder="اسمك *" name="name" />
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
