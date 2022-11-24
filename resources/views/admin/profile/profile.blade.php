@extends('admin.layouts.main')
@section('title', 'الصفخه الشخصيه')
@section('content')
    <div class="content-wrapper profile-page">
        <div class="row">
            <div class="col-lg-12 mb-30">
                <div class="card">
                    <div class="card-body">
                        <div class="user-bg" style="background: url({{ asset('admin/images/user-bg.jpg') }});">
                            <div class="user-info">
                                <div class="row">
                                    <div class="col-lg-6 align-self-center">
                                        <div class="user-dp px-2">
                                            <label for="image">
                                                <img src="{{ Auth::user()->getFirstMediaUrl('admins') ? asset(Auth::user()->getFirstMediaUrl('admins')) : asset('admin/images/admin_def.webp') }}"alt=""
                                                    id="frame" style="height: 120px;width:150px">
                                                <input type="file" name="image" class="d-none" id="image"
                                                    oninput='UpdatePreview()'form="admin-data">
                                            </label>
                                        </div>
                                        <div class="user-detail">
                                            <h2 class="name">{{ $admin->name }}</h2>
                                            <p class="designation mb-0">{{ $admin->email }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                @include('admin.layouts.errors')
                @include('admin.layouts.success')
            </div>
            <div class="col-xl-6 mb-30 mx-auto">
                <div class="card mb-30 about-me">
                    <div class="card-body">
                        <h5 class="card-title">معلوماتى</h5>
                        <form action="{{ route('profile.update', $admin->id) }}" method="post"
                            enctype="multipart/form-data" id="admin-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group my-2">
                                <label for="name" class="form-label">الاسم</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ $admin->name }}">
                            </div>
                            <div class="form-group my-2">
                                <label for="password" class="form-label">كلمه المرور جديده</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group my-2">
                                <label for="password_confirmation" class="form-label">تاكيد كلمه المرور الجديده</label>
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control">
                            </div>
                            <div class="form-group my-2 text-center">
                                <input type="submit" value="حفظ التعديلات" class="btn btn-success">
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    </div>
@endsection
@section('js')
    <script>
        function UpdatePreview() {
            $('#frame').attr('src', URL.createObjectURL(event.target.files[0]));
        };
    </script>
@endsection
