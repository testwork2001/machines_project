@extends('admin.layouts.main')
@section('title', " عرض بيانات العميل {$client->name}")
@section('content')
    <div class="content-wrapper">
        <div class="col-12">
            @include('admin.layouts.errors')
            @include('admin.layouts.success')
        </div>
        <form action="{{ route('clients.update', $client->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="col-xl-8 mb-30 mx-auto">
                <div class="card card-statistics h-100">
                    <div class="card-body">
                        <h3 class="card-title">  عرض بيانات العميل {{ $client->name }}</h3>
                        <div class="col-12 p-4 border-bottom">
                            <h5> اسم العميل : <span class="text-success"> {{ $client->name }}</span> </h5>
                        </div>
                        <div class="col-12 p-4 border-bottom">
                            <h5> البريد الالكترونى : <span class="text-success"> {{ $client->email }}</span> </h5>
                        </div>
                        <div class="col-12 p-4 border-bottom">
                            <h5> الهاتف المحمول : <span class="text-success"> {{ $client->phone }}</span> </h5>
                        </div>
                        <div class="col-12 p-4 border-bottom">
                            <h5> الحاله </h5>
                            <select name="status" class="form-control" style="height:55px;font-size:18px">
                                @foreach ($statuses as $key => $status)
                                    <option value="{{ $status }}" {{ $status == $client->status ? 'selected' : '' }}>
                                        {{ $key }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 p-4 border-bottom">
                            <h5> تاريخ الانشاء : <span class="text-success"> {{ $client->created_at }}</span> </h5>
                        </div>
                        <div class="col-12 p-4 border-bottom">
                            <h5> تاريخ التعديل : <span class="text-success"> {{ $client->updated_at }}</span> </h5>
                        </div>
                        <div class="col-12 text-center p-3">
                            <input type="submit" value="حفظ التعديلات" class="btn btn-success my-1">
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <div class="col-xl-8 mb-30 mx-auto">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <h3 class="card-title"> الاستفسارات التى كتبها {{ $client->name }}</h3>
                    @forelse ($client->inquiries as $inquiry)
                    <div class="col-12 p-4 border-bottom">
                        <h4> الاستفسار</span> </h4>
                        <p>{{ $inquiry->description }}</p>
                        <h4>اسم المنتج</h4>
                        <p>{{ $inquiry->product->name }}</p>
                    </div>
                    @empty
                        <div class="col-12 text-center p-1 text-danger fs-2">
                            لا يوجد استفسارات لهذا العميل قد تم حذفها ماخرا
                        </div>
                    @endforelse 
                </div>
            </div>
        </div>
    </div>
@endsection

