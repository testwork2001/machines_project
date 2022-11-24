@extends('admin.layouts.main')
@section('title', 'كل العملاء')

@section('content')
    <div class="content-wrapper">
        @include('admin.layouts.success')
        @include('admin.layouts.errors')

        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-2">كل العملاء الموجوده حاليا</h4>
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
                                        <th>رقم العميل</th>
                                        <th>اسم العميل</th>
                                        <th>البريد الالكترونى</th>
                                        <th>التليفون</th>
                                        <th>الحاله</th>
                                        <th>عدد الاستفسارات</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($clients as  $client)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $client->name }}</td>
                                            <td>{{ $client->email }}</td>
                                            <td>{{ $client->phone }}</td>
                                            <td><label
                                                    @class([
                                                        'badge fs-1',
                                                        'badge-danger' => $client->status == '0',
                                                        'badge-success' => $client->status == '1',
                                                    ])>{{ $client->status == '1' ? 'مفعل' : 'غير مفعل' }}</label>
                                            </td>
                                            <td>{{$client->inquiries_count}}  من الاستفسارات  </td>
                                            <td>{{ $client->created_at }} </td>
                                            <td>{{ $client->updated_at }} </td>
                                            <td><a href="{{ route('clients.edit', $client->id) }}"
                                                    class="btn btn-success m-1">
                                                    تعديل</a>
                                                <form action="{{ route('clients.destroy', $client->id) }}" method="post"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" value="حذف"
                                                        class="btn btn-outline-danger m-1">
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
