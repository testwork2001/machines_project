@extends('admin.layouts.main')
@section('title', 'انشاء صفه جديده')
@section('content')
    <div class="content-wrapper">

        <div class="col-12">
            @include('admin.layouts.errors')
            @include('admin.layouts.success')
        </div>
        <form action="{{ route('specs.store') }}" method="post" >
            @csrf
            <div class="col-xl-8 mb-30 mx-auto">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title">من فضلك قوم بادخال بيانات الصفه</h5>
                        <div>
                            <section>
                                <div class="card-body">
                                    <div class="repeater-add">
                                        <div data-repeater-list="specs">
                                            <div data-repeater-item>
                                                <div class="row mb-20">
                                                    <div class="col-md-4">
                                                        <label>اسم الصفه *</label>
                                                        <input type="text" class="form-control"
                                                            placeholder="ادخل اسم الصفه" name='name'>
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
