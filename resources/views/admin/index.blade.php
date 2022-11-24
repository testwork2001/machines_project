@extends('admin.layouts.main')
@section('title', 'الصفحه الرئسيه')
@section('content')
<div class=" col-12 row justify-content-center align-items-center" style="height: 90vh">
    <div class="col-10 col-lg-8 text-center mx-auto p-2 bg-light my-5 ">
        <h1 class="text-success my-3">مرحبا {{ Illuminate\Support\Facades\Auth::user()->name }}</h1>
        <h3 class="text-primary">مرحبا بك فى لوحه التحكم الخاصه بنا</h3>
    </div>
</div>
@endsection
