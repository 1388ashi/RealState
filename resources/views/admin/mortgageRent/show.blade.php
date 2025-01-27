@extends('admin.layouts.master')
@section('content')
    <div class="page-header ">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i> داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.mortgage-rents.index') }}">لیست ملک های رهن و اجاره</a></li>
            <li class="breadcrumb-item active" aria-current="page">نمایش ملک</li>

        </ol>
        <div>
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <button data-toggle="modal" data-target="#editStatus" class="btn btn-warning">
                    ویرایش وضعیت ملک رهن و اجاره
                    <i class="fa fa-pencil"></i>
                </button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <x-alert-danger></x-alert-danger>
                    <x-alert-success></x-alert-success>
                    <p class="header p-3" style="font-size: 22px" data-sider-select-id="9307cbef-94b5-42d0-80a4-80f8306b0261">اطلاعات ملک</p>
                    <div class="d-flex flex-row">  
                        <ul class="list-group flex-fill">  
                            <li class="list-group-item"><b class="bold">ادرس: </b>{{$mortgageRent->address}}</li>  
                            <li class="list-group-item"><b class="bold">نوع: </b>{{ $mortgageRent->type->title }}</li>  
                            <li class="list-group-item"><b class="bold">محله: </b>{{ $mortgageRent->location->title }}</li>  
                            <li class="list-group-item"><b class="bold">امکانات: </b>  
                                @foreach($mortgageRent->facilities as $key => $item)  
                                {{$item->title}}  
                                @if($key < $mortgageRent->facilities->count() - 1),@endif  
                                @endforeach</li>  
                            <li class="list-group-item"><b class="bold">مبلغ رهن: </b>{{ number_format($mortgageRent->mortgage_amount) }}</li>  
                            <li class="list-group-item"><b class="bold">مبلغ اجاره: </b>{{ number_format($mortgageRent->rent_amount) }}</li>  
                            <li class="list-group-item"><b class="bold">مشتری: </b>{{$mortgageRent->customer}}</li>  
                            <li class="list-group-item"><b class="bold">تلفن مشتری: </b>{{$mortgageRent->customer_mobile}}</li>  
                            <li class="list-group-item"><b class="bold">وضعیت ملک: </b>  
                                @if ($mortgageRent->status == 1)  
                                    <span class="badge badge-success status_id">باز</span>  
                                @else  
                                    <span class="badge badge-danger status_id">بسته</span>  
                                @endif  
                            </li>  
                        </ul>  
                        <ul class="list-group flex-fill">  
                            <li class="list-group-item"><b class="bold">طبقه: </b>{{ $mortgageRent->floor }}</li>  
                            <li class="list-group-item"><b class="bold">تعداد خواب: </b>{{$mortgageRent->num_rooms}}</li>  
                            <li class="list-group-item"><b class="bold">درب: </b>
                                {{ $mortgageRent->door == 'independent' ? 'مستقل' : 'مشترک' }}</li>  
                            <li class="list-group-item"><b class="bold">پارکینگ: </b>{{ $selling->parking == 1 ? 'دارد' : 'ندارد' }}</li>  
                            <li class="list-group-item"><b class="bold">انباری: </b>{{ $selling->warehouse == 1 ? 'دارد' : 'ندارد' }}</li>  
                            <li class="list-group-item"><b class="bold">حداکثر تعداد مستاجر: </b>{{ $mortgageRent->tenant }}</li>  
                            <li class="list-group-item"><b class="bold">موقعیت: </b>
                                @if ($mortgageRent->location_text == 'north')
                                شمالی
                                @elseif ($mortgageRent->location_text == 'south')
                                جنوبی
                                @elseif ($mortgageRent->location_text == 'west')
                                غربی
                                @else
                                شرقی
                                @endif
                            </li>  
                            <li class="list-group-item"><b class="bold">متراژ: </b>{{ $mortgageRent->area }}</li>  
                        </ul>  
                    </div>  
                    <div class="mt-1">
                        <b class="font-weight-bold form-label">توضیحات ملک:</b><p>{!!$mortgageRent->description!!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="icons">
            <a class="btn btn-danger icons" href="{{route('admin.mortgage-rents.index')}}"> برگشت</a>
        </div>
    </div>

    <div class="modal fade" id="editStatus">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <form action="{{route('admin.mortgage-rents.changeStatus',$mortgageRent->id)}}" method="post">
                    @method('patch')
                    @csrf
                    <div class="modal-header">
                        <p class="modal-title font-weight-bolder">ویرایش وضعیت</p>
                    <button  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">وضعیت<span class="text-danger">&starf;</span></label>
                        <select class="form-control select2" name="status">
                            <option value="1" @selected($mortgageRent->status == '1')>باز</option>
                            <option value="0" @selected($mortgageRent->status == '0')>بسته</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn btn-warning  text-right item-right">به روزرسانی</button>
                    <button class="btn btn-outline-danger  text-right item-right" data-dismiss="modal">برگشت</button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection