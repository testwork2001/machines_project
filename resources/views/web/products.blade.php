@extends('web.layouts.main')
@section('title', ' المنتجات')
@section('content')
    <div class="blog" dir="rtl">
        <div class="col-11 col-md-8 col-lg-6 mx-auto mb-2 row justify-content-center">
            <input type="search" id="search" class="col-sm-8 form-control p-2 fs-2" placeholder="بحث عن منتج..."
                style="height:50px" required>
            <button type="button" class="btn btn-danger col-sm-3 mx-1 my-2 my-sm-0" id="btn-search">بحث</button>
        </div>
        <div class="container">
            <div class="section-header text-center my-3">
                <p>منتجاتنا</p>
                <h2>كل المنتجات</h2>
            </div>

            <div class="row products">
                @foreach ($products as $product)
                    <div class="col-lg-4 product-item">
                        <div class="blog-item">
                            <div class="blog-img">
                                <a href="{{route('details' , ['slug'=>$product->slug])}}"><img src="{{ asset($product->getFirstMediaUrl('products'))}}" alt="Image"></a>
                                <div class="show_detials">
                                    <p><a href="{{route('details' , ['slug'=>$product->slug])}}" class="btn btn-danger "> عرض المزيد</a></p>
                                </div>
                            </div>
                            <div class="blog-text text-right">
                                <h3><a href="{{ route('details', $product->slug) }}">{{ $product->name }}</a></h3>
                                <p class="mt-0">
                                    {{ $product->description }}
                                </p>
                            </div>
                            <div class="blog-meta">
                                <p class="text-right">
                                    <a >
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
                                    <a >
                                        <i class="fa fa-comments  "></i>
                                        <span class="">{{$product->inquiries_count}}</span>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $('#btn-search').on('click', function() {
            $.ajax({
                type: "get",
                url: "{{ asset('api/products/search/') }}",
                data: {
                    "key": $('#search').val()
                },
                headers: {
                    "accept": "application/json",
                    "accept-language": 'ar'
                },
                success: function(response, status) {
                    $('.products').empty()
                    $('.products').html(response.htmlData)

                },
                error: function(xhr, status, error) {

                }
            });
        })

        
    </script>
@endsection
