@extends('admin.layouts.main')
@section('title' ,"الصفات")

@section('content')
    <div class="content-wrapper">
        @include('admin.layouts.success')
        @include('admin.layouts.errors')

        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-2">كل الصفات الموجوده حاليا</h4>
                    <div class="co-12 p-2 text-center">
                        <a href="{{ route('specs.create') }}" class="btn btn-success">انشاء صفه جديده</a>
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
                                        <th>رقم الصفه</th>
                                        <th>اسم الصفه</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($specs as  $spec)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <th>{{ $spec->name }}</th>
                                            <th>{{ $spec->created_at }} </th>
                                            <th>{{ $spec->updated_at }} </th>
                                            <th><a href="{{ route('specs.edit', $spec->id) }}" class="btn btn-success m-1">
                                                    تعديل</a>
                                                <form action="{{ route('specs.destroy', $spec->id) }}" method="post"
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