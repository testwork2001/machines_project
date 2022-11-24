@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">

        <div class="col-12">
            @include('admin.layouts.errors')
            @include('admin.layouts.success')
        </div>
        <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-xl-8 mb-30 mx-auto">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title">من فضلك قوم بادخال بيانات المنتج</h5>
                        <div>
                            <h3>البيانات الاساسيه</h3>
                            <section class="my-2">
                                <h4 class="sr-only">&nbsp;</h4>
                                <p>
                                    <label for="title-3"> اسم المنتج * </label><br />
                                    <input id="title-3" type="text" class="form-control" name="name"
                                        value="{{ old('name') }}"><br />
                                    <label for="title-3"> سعر المنتج *</label><br />
                                    <input id="title-3" type="text" class="form-control" name="price"
                                        value="{{ old('price') }}"><br />
                                    <label for="title-3"> الكميه *</label><br />
                                    <input id="title-3" type="number" class="form-control" name="quantity"
                                        value="{{ old('quantity') }}"><br />
                                    <label for="title-3"> القسم التابع له *</label><br />
                                    <select name="category_id" class="form-control" style="height: 50px">
                                        <option selected disabled></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ old('category') == $category->id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select><br />
                                    <label for="title-3">حاله المنتج *</label><br />
                                    <select name="status" class="form-control" style="height: 50px">
                                        <option selected disabled></option>
                                        @foreach ($statuses as $key => $status)
                                            <option value="{{ $status }}"
                                                {{ old('status') == $status ? 'selected' : '' }}>{{ $key }}
                                            </option>
                                        @endforeach
                                    </select><br />
                                    <label for="text-3">التفاصيل *</label><br />
                                    <textarea id="text-3" rows="10" class="form-control" name="description"> {{ old('description') }}</textarea>
                                </p>

                            </section>
                            <h3 class="pt-5">مواصفات المنتج</h3>
                            <section>
                                <div class="card-body">
                                    <div class="repeater-add">
                                        <div data-repeater-list="specs">
                                            <div data-repeater-item>
                                                <div class="row mb-20">
                                                    <div class="col-md-4 fs-3">
                                                        <label for="inputAddress">الصفه</label>
                                                        <select class="form-control" id="inputAddress" name='spec_id'
                                                            style="height:50px">
                                                            @foreach ($specs as $spec)
                                                                <option value="{{ $spec->id }}">{{ $spec->name }}
                                                                </option>
                                                            @endforeach

                                                        </select>
                                                    </div>
                                                    <div class="col-md-4">

                                                        <label for="inputAddress5">القيمه</label>
                                                        <input type="text" class="form-control" id="inputAddress5"
                                                            placeholder="ادخل قيمه الصفه" name='value'>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="btn btn-danger btn-block mt-30" data-repeater-delete
                                                            type="button" value="حذف" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix mb-20">
                                            <input class="button" data-repeater-create type="button" value="اضافه صفه " />
                                        </div>
                                    </div>
                            </section>
                            <h3 class="pt-5">اختر صوره للمنتج</h3>
                            <section>
                                <div class="card-body">
                                    <div class="repeater-add">
                                        <div data-repeater-list="images">
                                            <div data-repeater-item>
                                                <div class="row mb-20">
                                                    <div class="form-group">
                                                        <label for="">اختر صوره</label>
                                                        <input type="file" name='file_name' class="form-control">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <input class="btn btn-danger btn-block mt-30" data-repeater-delete
                                                            type="button" value="حذف" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group clearfix mb-20">
                                            <input class="button" data-repeater-create type="button" value="اضافه صفه " />
                                        </div>
                                    </div>
                            </section>
                            <div class="col-12 text-center p-3">
                                <input type="submit" value="انشاء" name="create" class="btn btn-success my-1">
                                <input type="submit" value="انشاء و رجوع" name="create-return"
                                    class="btn btn-outline-success my-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('js')
    <script>
        function UpdatePreview() {
            $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
        };
    </script>
@endsection
