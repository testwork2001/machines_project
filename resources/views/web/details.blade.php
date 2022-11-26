@extends('web.layouts.main')
@section('title', "عرض تفاصيل {$product->name}")
@section('css')

@endsection
@section('content')
    <div class="col-11 col-lg-10 mx-auto  mt-5 px-2">
        <div class=" text-right p-2 row justify-content-around " dir="rtl">
            <div class="col-11 col-lg-6 card mx-auto my-2">
                <h3 class="card-title px-3 pt-3 text-danger">
                    {{ $product->name }}
                </h3>
                <div class="card-body">
                    <p style="font-size: 20px;line-height:1.6 ;padding-bottom:1px">{{ $product->description }}</p>
                    <p class="row justify-content-around" style="line-height:1.6">
                    <div class=" h6"><bdi>السعر: {{ $product->price }} جنيه</bdi></div>
                    <div class="h6"><bdi>الكميه: {{ $product->price }} وحده</bdi></div>
                    </p>
                    <table class="table">
                        <h5>مواصفات المنتج</h5>
                        <tr>
                            <th>الصفه</th>
                            <th>القيمه</th>
                        </tr>
                        @foreach ($specs as $spec)
                            <tr>
                                <td>{{ $spec->name }}</td>
                                <td>{{ $spec->pivot->value }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-6 text-center mx-auto my-2 row justify-content-between">
                <img src="{{ asset($product->getFirstMediaUrl('products')) }}" alt=""
                    style="width:80%; border-radius:10px;max-height:400px" class="my-1" id='myimage'>
                <div style="width: 18%">
                    @foreach ($product->getMedia('products') as $media)
                        <img src="{{ asset($media->getUrl()) }}" alt="" style="width:100%; border-radius:10px ;cursor: pointer"
                            class="my-1 convert">
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <div class="col-11 col-lg-8 mx-auto py-2 justify-content-center" dir="rtl">
        <div class='text-center'>
            <button id="switech" type="button" class="btn btn-primary"> <bdi>استفسار عن {{ $product->name }}
                </bdi></button>
        </div>
        <div class="col-12 py-3 px-1 d-none bg-light my-2" id="form-box">
            <form action="{{ route('inquiry.store') }}" method="post" id="target">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                @csrf
                <div class="form-group col-lg-8 mx-auto">
                    <label for="username" class="col-12 text-right">اسمك *</label>
                    <input type="text" name="name" id="username" required placeholder="من فضلك اكتب اسمك *"
                        class="form-control " value="{{ old('name') }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-8 mx-auto">
                    <label for="email" class="col-12 text-right">البريد الالكترونى *</label>
                    <input type="email" name="email" id="email" required
                        placeholder="من فضلك اكتب البريد الالكترونى *" class="form-control " value="{{ old('email') }}">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-8 mx-auto">
                    <label for="phone" class="col-12 text-right">الهاتف المحمول *</label>
                    <input type="tel" name="phone" id="phone" required placeholder="من فضلك اكتب الهاتف المحمول *"
                        class="form-control " value="{{ old('phone') }}">
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-lg-8 mx-auto">
                    <label for="description" class="col-12 text-right">اكتب استفسارك *</label>
                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group text-center">
                    <input type="submit" value="ارسال الاستفسار" class="btn btn-success m-1">
                </div>
            </form>
        </div>
    </div>

@endsection
@section('js')
    <script>
        $('#switech').on('click', function() {
            $('#form-box').removeClass('d-none')
            $(this).removeClass('btn-primary')
            $(this).addClass('btn-danger')
        })
    </script>
    <script>
        $('.convert').on('click' , function(){
            document.getElementById('myimage').setAttribute('src' , this.src)
        })
    </script>
@endsection
