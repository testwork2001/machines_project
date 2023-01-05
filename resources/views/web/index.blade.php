@extends('web.layouts.main')
@section('title', 'الصفحه الرئسيه')
@section('content')
    <div class="col-12 p-0">
        <video src="{{ asset('web/videos/homeVideo.mp4') }}" controls autoplay muted loop class="w-100 m-0"></video>
    </div>
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
                        <h3 class="text-danger">كيف تساعدك شركة الغيطانى لتصنيع ماكينات الرخام والجرانيت في إطلاق وتطوير
                            مشروعك؟</h3>
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
                            وفضلاً عن هذا وذاك فإن شركه الغيطانى تقدم اسعار منافسة جدًا لـ ماكينة قص الرخام والجرانيت
                            وماكينة تلميع الرخام والجرانيت، مقارنةً بالمنافسين من حيث مقارنة الجودة والنتائج بالأسعار والتي
                            ستنتج في النهاية قيمة أفضل لـ ماكينات تقطيع الرخام والجرانيت التي تقدمها الشركة.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    <!-- Blog Start -->
    <div class="blog" dir="rtl">
        <div class="container bg-light py-2">
            <div class="section-header text-center">
                <p>منتجاتنا</p>
                <h2>احدث المنتجات</h2>
            </div>
            <div class="row ">
                @foreach ($products as $product)
                    <div class="col-lg-4 ">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="{{route('details' , ['slug'=>$product->slug])}}"><img src="{{ asset($product->getFirstMediaUrl('products'))}}" alt="Image"></a>
                                <div class="show_detials">
                                    <p><a href="{{route('details' , ['slug'=>$product->slug])}}" class="btn btn-danger "> عرض المزيد</a></p>
                                </div>
                            </div>
                            <div class="blog-text text-right">
                                <h3><a href="{{ route('details', $product->slug) }}">{{ $product->name }}</a></h3>
                                <p style="padding-bottom:20px">
                                    {{ $product->description }}

                                </p>
                            </div>

                            <div class="blog-meta">
                                <p class="text-right">
                                    <a>
                                        <i class="fas fa-money-bill-wave"></i>
                                        <span class="">{{ $product->price . ' ' }} جنيه </span>
                                    </a>
                                </p>
                                <p class="text-right">
                                    <a>
                                        <i class="fas fa-shopping-basket  "></i>
                                        <span class="">{{ $product->quantity }}
                                            {{ $product->quantity > 1 ? ' من الوحدات ' : ' وحده ' }}</span>
                                    </a>
                                </p>
                                <p class="text-right">
                                    <a>
                                        <i class="fa fa-comments  "></i>
                                        <span class="">{{ $product->inquiries_count }}</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Blog End -->

    <!-- Service Start -->
    <div class="service" dir="rtl">
        <div class="container bg-light rounded p-2">
            <div class="section-header text-center">
                <p>خدمتنا</p>
                <h2>ماذا نسطيع ان نقدم لعملائنا</h2>
            </div>
            <div class="row text-center justify-content-around">
                <div class="col-11 col-md-5 col-xl-3 mx-2 my-2 rounded bg-white">
                    <div class="service-item p-1">
                        <i class="flaticon-car-wash-1"></i>
                        <h3>الشركه العربيه لتجاره</h3>
                        <p> بالنقر على الزرّ، فإنك توافق على شروط الخدمة. سنعالج بياناتك الشخصية لتلبية طلبك ولأغراض أخرى
                            وفقًا لـ سياسة الخصوصية. ويمكنك إلغاء المدفوعات المتكررة في أي وقت.</p>
                    </div>
                </div>
                <div class="col-11 col-md-5 col-xl-3 mx-2 my-2 rounded bg-white">
                    <div class="service-item p-1">
                        <i class="flaticon-car-wash"></i>
                        <h3>الشركه العربيه لتجاره</h3>
                        <p> بالنقر على الزرّ، فإنك توافق على شروط الخدمة. سنعالج بياناتك الشخصية لتلبية طلبك ولأغراض أخرى
                            وفقًا لـ سياسة الخصوصية. ويمكنك إلغاء المدفوعات المتكررة في أي وقت.</p>
                    </div>
                </div>
                <div class="col-11 col-md-5 col-xl-3 mx-2 my-2 rounded bg-white">
                    <div class="service-item p-1">
                        <i class="flaticon-vacuum-cleaner"></i>
                        <h3>الشركه العربيه لتجاره</h3>
                        <p> بالنقر على الزرّ، فإنك توافق على شروط الخدمة. سنعالج بياناتك الشخصية لتلبية طلبك ولأغراض أخرى
                            وفقًا لـ سياسة الخصوصية. ويمكنك إلغاء المدفوعات المتكررة في أي وقت.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Service End -->


@endsection
