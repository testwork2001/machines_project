@extends('admin.layouts.main')
@section('title' ,"الاقسام")

@section('content')
    <div class="content-wrapper">
        @include('admin.layouts.success')
        @include('admin.layouts.errors')

        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-2">كل الاقسام الموجوده حاليا</h4>
                    <div class="co-12 p-2 text-center">
                        <a href="{{ route('categories.create') }}" class="btn btn-success">انشاء قسم جديده</a>
                    </div>
                </div>

            </div>
        </div>
        <!-- main body -->
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table center-aligned-table mb-0 p-0">
                                <thead>
                                    <tr>
                                        <th>رقم القسم</th>
                                        <th>اسم القسم</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as  $category)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <th>{{ $category->name }}</th>
                                            <th>{{ $category->created_at }} </th>
                                            <th>{{ $category->updated_at }} </th>
                                            <th><a href="{{ route('categories.edit', $category->id) }}" class="btn btn-success m-1">
                                                    تعديل</a>
                                                <form action="{{ route('categories.destroy', $category->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="حذف" class="btn btn-outline-danger m-1">
                                                </form>
                                            </th>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection