@extends('admin.layouts.main')
@section('title', 'كل المشرفين')

@section('content')
    <div class="content-wrapper">
        @include('admin.layouts.success')
        @include('admin.layouts.errors')

        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-2">كل المشرفين الموجوده حاليا</h4>
                    <div class="co-12 p-2 text-center">
                        <a href="{{ route('admins.create') }}" class="btn btn-success">انشاء مشرف جديد</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 mb-30">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="table center-aligned-table mb-0 p-0">
                                <thead>
                                    <tr>
                                        <th>رقم المشرف</th>
                                        <th>صوره المشرف</th>
                                        <th>اسم المشرف</th>
                                        <th>البريد الالكترونى</th>
                                        <th>حاله البريد الالكترونى</th>
                                        <th>الحاله</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($admins as  $admin)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td><img src="{{ $admin->getFirstMediaUrl('admins') ? asset($admin->getFirstMediaUrl('admins')) : asset('admin/images/admin_def.webp') }}"
                                                    alt="" style="width: 50px;height:50px;border-radius:50%"></td>
                                            <td>{{ $admin->name }}</td>
                                            <td>{{ $admin->email }}</td>
                                            <td><label
                                                    @class([
                                                        'badge fs-1',
                                                        'badge-danger' => $admin->email_verified_at == null,
                                                        'badge-success' => $admin->email_verified_at != null,
                                                    ])>{{ $admin->email_verified_at ?? 'لم يتم التحق منه' }}</label>
                                            </td>
                                            <td><label
                                                    @class([
                                                        'badge fs-1',
                                                        'badge-danger' => $admin->status == '0',
                                                        'badge-success' => $admin->status == '1',
                                                    ])>{{ $admin->status == '1' ? 'مفعل' : 'غير مفعل' }}</label>
                                            </td>
                                            <td>{{ $admin->created_at }} </td>
                                            <td>{{ $admin->updated_at }} </td>
                                            <td><a href="{{ route('admins.edit', $admin->id) }}"
                                                    class="btn btn-success m-1">
                                                    تعديل</a>

                                            </td>
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
