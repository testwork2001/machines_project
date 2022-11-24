@extends('admin.layouts.main')
@section('title', 'كل الاستفسارات')

@section('content')
    <div class="content-wrapper">
        @include('admin.layouts.success')
        @include('admin.layouts.errors')
        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-2">كل الاستفسارات الموجوده حاليا</h4>
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
                                        <th>رقم الاستفسار</th>
                                        <th> الاستفسار</th>
                                        <th>اسم المنتج </th>
                                        <th>العميل</th>
                                        <th> البريد الالكترونى</th>
                                        <th> الهاتف المحمول</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($inquiries as  $inquiry)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td style="overflow: auto"> {{ $inquiry->description }} </td>
                                            <td> {{ $inquiry->product->name }}</td>
                                            <td>{{ $inquiry->client->name }}</td>
                                            <td> {{ $inquiry->client->email }}</td>
                                            <td> {{ $inquiry->client->phone }}</td>
                                            <td> {{ $inquiry->created_at }}</td>
                                            <td> {{ $inquiry->client->updated_at }}</td>
                                            <td>
                                                <form action="{{ route('inquiries.destroy', $inquiry->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="حذف" class="btn btn-outline-danger m-1">
                                                </form>
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
