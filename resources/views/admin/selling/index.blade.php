@extends('admin.layouts.master')

@section('content')
    <div class="page-header m-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i> داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست همه ملک های فروشی</li>
        </ol>
        <div class="mt-3">
            <a href="{{ route('admin.sellings.create') }}" class="btn btn-indigo">
                ثبت ملک جدید
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>

    <div class="row mt-3">
        @include('admin.selling.filter')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="card-title">لیست همه ملک های فروشی ({{ count($sellings) }})</div>
                    <div class="card-options">
                        <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a>
                        <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i class="fe fe-maximize"></i></a>
                        <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
                    </div>
                </div>
                <div class="card-body">
                    <x-alert-danger></x-alert-danger>
                    <x-alert-success></x-alert-success>
                    <div class="table-responsive">
                        <table id="example-2" class="table table-striped table-bordered text-nowrap text-center">
                            <thead>
                                <tr>
                                    <th class="border-top">ردیف</th>
                                    <th class="border-top">مشتری</th>
                                    <th class="border-top">محله</th>
                                    <th class="border-top">نوع ملک</th>
                                    <th class="border-top">قیمت</th>
                                    <th class="border-top">وضعیت</th>
                                    <th class="border-top">عملیات</th>
                                </tr>
                        </thead>
                        <tbody>
                            @forelse($sellings as $selling)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $selling->customer }}</td>
                                <td>{{ $selling->location->title }}</td>
                                <td>{{ $selling->type->title }}</td>
                                <td>{{ number_format($selling->amount) }}</td>
                                <td>
                                    @if ($selling->status == 1)
                                        <span class="badge badge-success status_id">باز</span>
                                    @else
                                        <span class="badge badge-danger status_id">بسته</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.sellings.show',$selling) }}" class="btn btn-info btn-sm text-white" 
                                        data-toggle="tooltip" data-original-title="نمایش">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.sellings.edit',$selling) }}" class="btn btn-warning btn-sm text-white" 
                                        data-toggle="tooltip" data-original-title="ویرایش">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm text-white" 
                                    onclick="confirmDelete('delete-{{ $selling->id }}')" data-original-title="حذف" >
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <form 
                                        action="{{ route('admin.sellings.destroy',$selling)}}" 
                                        id="delete-{{$selling->id}}" 
                                        method="POST" 
                                        style="display: none;">
                                        @csrf
                                        @method("DELETE")
                                    </form>
                                </td>
                            </tr>
                                    @empty
                                        
                                <tr>
                                    <td colspan="8">
                                        <p class="text-danger"><strong>در حال حاضر هیچ ملکی وجود ندارد!</strong></p>
                                    </td>
                                </tr>
                            @endforelse
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

