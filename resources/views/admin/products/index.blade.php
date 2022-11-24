@extends('admin.layouts.main')

@section('content')
    <div class="content-wrapper">
        @include('admin.layouts.success')
        @include('admin.layouts.errors')

        <div class="page-title">
            <div class="row">
                <div class="col-12">
                    <h4 class="mb-2">كل المنتجات الموجوده حاليا</h4>
                    <div class="co-12 p-2 text-center">
                        <a href="{{ route('products.create') }}" class="btn btn-success">انشاء منتج</a>
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
                                        <th>رقم المنتج</th>
                                        <th>صوره المنتج</th>
                                        <th>اسم المنتج</th>
                                        <th>اسم القسم التابع له</th>
                                        <th>السعر</th>
                                        <th>الكميه</th>
                                        <th>الحاله</th>
                                        <th>تاريخ الانشاء</th>
                                        <th>تاريخ التعديل</th>
                                        <th>العمليات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as  $product)
                                        <tr>
                                            <th>{{ $loop->iteration }}</th>
                                            <th><img src="{{ asset($product->getFirstMediaUrl('products')) }}"
                                                    style="width:50px;height:50px;border-radius:50%"></th>
                                            <th>{{ $product->name }}</th>
                                            <th>{{ $product->category->name }} </th>

                                            <th>{{ $product->price }} جنيه</th>
                                            <th @class([
                                                'text-danger' => $product->quantity == 0,
                                                'text-warning' => $product->quantity > 0 && $product->quantity < 15,
                                                'text-success' => $product->quantity > 15,
                                            ])>{{ $product->quantity }}
                                                {{ $product->quantity > 1 ? ' من وحدات' : 'وحده' }}</th>
                                            <td><label
                                                    @class([
                                                        'badge fs-1',
                                                        'badge-danger' => $product->status == '0',
                                                        'badge-success' => $product->status == '1',
                                                    ])>{{ $product->status == '1' ? 'متاح حاليا' : 'غير متاح حاليا' }}</label>
                                            </td>
                                            <th>{{ $product->created_at }} </th>
                                            <th>{{ $product->updated_at }} </th>
                                            <th><a href="{{ route('products.edit', $product->id) }}"
                                                    class="btn btn-success m-1">
                                                    تعديل</a>
                                                <form action="{{ route('products.destroy', $product->id) }}" method="post"
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
