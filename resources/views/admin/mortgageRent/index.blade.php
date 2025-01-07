@extends('admin.layouts.master')

@section('content')
    <div class="page-header m-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i> داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست همه ملک های رهن و اجاره</li>
        </ol>
        <div class="mt-3">
            <a href="{{ route('admin.mortgage-rents.create') }}" class="btn btn-indigo">
                ثبت ملک جدید
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>

    <div class="row mt-3">
        @include('admin.mortgageRent.filter')
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="card-title">لیست همه ملک های رهن و اجاره ({{ count($mortgageRents) }})</div>
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
                                    <th class="border-top">قیمت رهن</th>
                                    <th class="border-top">قیمت اجاره</th>
                                    <th class="border-top">وضعیت</th>
                                    <th class="border-top">عملیات</th>
                                </tr>
                        </thead>
                        <tbody>
                            @forelse($mortgageRents as $mortgageRent)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $mortgageRent->customer }}</td>
                                <td>{{ $mortgageRent->location->title }}</td>
                                <td>{{ $mortgageRent->type->title }}</td>
                                <td>{{ number_format($mortgageRent->mortgage_amount) }}</td>
                                <td>{{ number_format($mortgageRent->rent_amount) }}</td>
                                <td>
                                    @if ($mortgageRent->status == 1)
                                        <span class="badge badge-success status_id">باز</span>
                                    @else
                                        <span class="badge badge-danger status_id">بسته</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.mortgage-rents.show',$mortgageRent->id) }}" class="btn btn-info btn-sm text-white" 
                                        data-toggle="tooltip" data-original-title="نمایش">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.mortgage-rents.edit',$mortgageRent) }}" class="btn btn-warning btn-sm text-white" 
                                        data-toggle="tooltip" data-original-title="ویرایش">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <button type="button" class="btn btn-danger btn-sm text-white" 
                                    onclick="confirmDelete('delete-{{ $mortgageRent->id }}')" data-original-title="حذف" >
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <form 
                                        action="{{ route('admin.mortgage-rents.destroy',$mortgageRent)}}" 
                                        id="delete-{{$mortgageRent->id}}" 
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

