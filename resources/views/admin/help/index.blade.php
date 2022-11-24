@extends('admin.layouts.main')
@section('title', 'كل المساعدات المطلوبه')

@section('content')
    <div class="content-wrapper">
        @include('admin.layouts.success')
        @include('admin.layouts.errors')

        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-2">كل المساعدات الموجوده حاليا</h4>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div>
                            <table class="table  mb-0 p-0">
                                <thead>
                                    <tr>
                                        <th>رقم المساعده</th>
                                        <th> المساعده</th>
                                        <th>العميل</th>
                                        <th> البريد الالكترونى</th>
                                        <th> الهاتف المحمول</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($helps as  $help)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="overflow: auto "> {{ $help->message }} </td>
                                            <td> {{ $help->name }}</td>
                                            <td>{{ $help->email }}</td>
                                            <td> {{ $help->phone }}</td>
                                            <td> {{ $help->created_at }}</td>
                                            <td> {{ $help->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('help.destory', $help->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="حذف" class="btn btn-outline-danger m-1">
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">لا يوجد مساعدات حاليا</td>
                                        </tr>
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
