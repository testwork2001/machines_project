@extends('admin.layouts.main')
@section('title', " {$category->name}التعديل على ")
@section('content')
    <div class="content-wrapper">

        <div class="col-12">
            @include('admin.layouts.errors')
            @include('admin.layouts.success')
        </div>
        <form action="{{ route('categories.update',$category->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="col-xl-8 mb-30 mx-auto">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">التعديل على بيانات {{ $category->name }}</h5>
                        <div class="row mb-20">
                            <div class="col-md-4">
                                <label>اسم القسم *</label>
                                <input type="text" class="form-control" placeholder="ادخل اسم القسم" name='name' value="{{$category->name}}">
                            </div>
                            <div class="col-md-2 pt-4">
                                <input type="submit" value="حفظ التعديل" class="btn btn-success my-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
