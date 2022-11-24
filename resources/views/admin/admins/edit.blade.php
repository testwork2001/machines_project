@extends('admin.layouts.main')
@section('title', " التعديل على {$admin->name}")
@section('content')
    <div class="content-wrapper">
        <div class="col-12">
            @include('admin.layouts.errors')
            @include('admin.layouts.success')
        </div>
        <form action="{{ route('admins.update', $admin->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="col-xl-8 mb-30 mx-auto">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h5 class="card-title"> التعديل على بيانات المشرف {{ $admin->name }} </h5>
                        <div>
                            <div class="mb-30">
                                <div class="card-body">
                                    <div class="form-group mb-15">
                                        <label for="name">اسم المشرف</label>
                                        <input class="form-control " type="text" placeholder="ادخل الاسم" name="name"
                                            value="{{ $admin->name }}">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="name">البريد الالكترونى</label>
                                        <input class="form-control " type="email" placeholder="ادخل البرد الالكترونى"
                                            name="email" value="{{ $admin->email }}">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="name"> كلمه مرور جديده</label>
                                        <input class="form-control" type="password" placeholder=" كلمه المرور"
                                            name="password">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="name"> تاكيد كلمه المرور </label>
                                        <input class="form-control" type="password" placeholder="تاكيد كلمه المرور "
                                            name="password_confirmation">
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="status">الحاله</label>
                                        <select class="form-control " name="status" style="height: 50px" id="status">
                                            <option selected disabled></option>
                                            @foreach ($statuses as $key => $status)
                                                <option value="{{ $status }}"
                                                    {{ $admin->status != $status ? '' : 'selected' }}>{{ $key }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-15">
                                        <label for="email_verified_at">حاله البريد الالكترونى</label>
                                        <select class="form-control form-control mb-15" style="height: 50px"
                                            name="email_verified_at" id="email_verified_at">
                                            <option selected disabled></option>
                                            <option value="0" {{ $admin->email_verified_at == null? 'selected' : '' }}>لم
                                                يتم التحقق</option>
                                            <option value="1" {{ $admin->email_verified_at != null ? 'selected' : '' }}>تم
                                                التحقق</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h3 class="pt-5 text-center">اختر صوره </h3>
                            <section>
                                <h4 class="sr-only">&nbsp;</h4>
                                <div class="form-group p-3 text-center ">
                                    <div class="">
                                        <label class="" for="customFile1">
                                            <img src="{{asset($admin->getFirstMediaUrl('admins') ?? 'admin/images/admin_def.webp')}}" id="frame"
                                                style="width: 200px;height:200px;border-radius: 50%" />
                                            <input type="file" class="d-none" id="customFile1" name="image"
                                                oninput='UpdatePreview()'>

                                        </label>
                                    </div>
                                </div>


                            </section>
                            <div class="col-12 text-center p-3">
                                <input type="submit" value="حفظ التعديلات" class="btn btn-success my-1">
                               
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
