@extends('admin.layouts.master')

@section('content')
    <!--  Page-header opened -->
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>
                    داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.mortgage-rents.index') }}">لیست
                    ملک های رهن و اجاره</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش ملک</li>
        </ol>
    </div>
    <!--  Page-header closed -->

    <!-- row opened -->
    <div class="row mx-3">
        <div class="col-md">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <p class="card-title" style="font-size: 15px;">ویرایش ملک</p>
                </div>
                <div class="card-body">
                    <x-alert-danger></x-alert-danger>
                    <form action="{{ route('admin.mortgage-rents.update',$mortgageRent->id) }}" method="post" class="save"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">محله</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="location_id">
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}" @selected($mortgageRent->location_id == $location->id)>{{$location->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="control-label">آدرس</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="آدرس را وارد کنید"
                                            name="address" value="{{old('address',$mortgageRent->address)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">امکانات</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="facilities[]" multiple>
                                            @foreach($facilities as $facilitie)
                                            <option  value="{{$facilitie->id}}"  @selected(in_array($facilitie->id, 
                                            old('facilities', $mortgageRent->facilities->pluck('id')->all())))>{{$facilitie->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">نوع ملک</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="type_id">
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}" @selected($mortgageRent->type_id == $type->id)>{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">طبقه</label>
                                        <select class="form-control select2" name="floor">
                                            <option value="همکف" @selected($mortgageRent->floor == 'همکف')>همکف</option>
                                            <option value="دوم" @selected($mortgageRent->floor == 'دوم')>دوم</option>
                                            <option value="سوم" @selected($mortgageRent->floor == 'سوم')>سوم</option>
                                            <option value="چهارم" @selected($mortgageRent->floor == 'چهارم')>چهارم</option>
                                            <option value="پنجم" @selected($mortgageRent->floor == 'پنجم')>پنجم</option>
                                            <option value="ششم" @selected($mortgageRent->floor == 'ششم')>ششم</option>
                                            <option value="هفتم" @selected($mortgageRent->floor == 'هفتم')>هفتم</option>
                                            <option value="زیرزمین" @selected($mortgageRent->floor == 'زیرزمین')>زیرزمین</option>
                                            <option value="ندارد">ندارد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">تعداد خواب</label>
                                        <select class="form-control select2" name="num_rooms">
                                            <option value="1" @selected($mortgageRent->num_rooms == '1')>1</option>
                                            <option value="2" @selected($mortgageRent->num_rooms == '2')>2</option>
                                            <option value="3" @selected($mortgageRent->num_rooms == '3')>3</option>
                                            <option value="4" @selected($mortgageRent->num_rooms == '4')>4</option>
                                            <option value="ندارد">ندارد</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">درب</label>
                                        <select class="form-control select2" name="door">
                                            <option value="independent" @selected($mortgageRent->door == 'independent')>مستقل</option>
                                            <option value="common" @selected($mortgageRent->door == 'common')>مشترک</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">پارکینگ</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="parking">
                                            <option value="1" @selected($mortgageRent->parking == '1')>دارد</option>
                                            <option value="0" @selected($mortgageRent->parking == '0')>ندارد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">انباری</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="warehouse">
                                            <option value="1" @selected($mortgageRent->warehouse == '1')>دارد</option>
                                            <option value="0" @selected($mortgageRent->warehouse == '0')>ندارد</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">حداکثر تعداد مستاجر</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="tenant">
                                            <option value="1" @selected($mortgageRent->tenant == '1')>1</option>
                                            <option value="2" @selected($mortgageRent->tenant == '2')>2</option>
                                            <option value="3" @selected($mortgageRent->tenant == '3')>3</option>
                                            <option value="4" @selected($mortgageRent->tenant == '4')>4</option>
                                            <option value="5" @selected($mortgageRent->tenant == '5')>5</option>
                                            <option value="6" @selected($mortgageRent->tenant == '6')>6</option>
                                            <option value="7" @selected($mortgageRent->tenant == '7')>7</option>
                                            <option value="8" @selected($mortgageRent->tenant == '8')>8</option>
                                            <option value="9" @selected($mortgageRent->tenant == '9')>9</option>
                                            <option value="10" @selected($mortgageRent->tenant == '10')>10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">موقعیت</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="location_text">
                                            <option value="north" @selected($mortgageRent->location_text == 'north')>شمالی</option>
                                            <option value="south" @selected($mortgageRent->location_text == 'south')>جنوبی</option>
                                            <option value="west" @selected($mortgageRent->location_text == 'west')>غربی</option>
                                            <option value="east" @selected($mortgageRent->location_text == 'east')>شرقی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">مبلغ رهن</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="مبلغ رهن را وارد کنید"
                                                name="mortgage_amount" value="{{old('mortgage_amount',number_format($mortgageRent->mortgage_amount))}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">مبلغ اجاره</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="مبلغ اجاره را وارد کنید"
                                                name="rent_amount" value="{{old('rent_amount',number_format($mortgageRent->rent_amount))}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">متراژ</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="متراژ را وارد کنید"
                                                name="area" value="{{old('area',$mortgageRent->area)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">مشتری</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="مشتری را وارد کنید"
                                                name="customer" value="{{old('customer',$mortgageRent->customer)}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">تلفن مشتری</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="تلفن مشتری را وارد کنید "
                                                name="customer_mobile" value="{{old('customer_mobile',$mortgageRent->customer_mobile)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">وضعیت ملک</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="status">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="1" @selected($mortgageRent->status == '1')>باز</option>
                                            <option value="0" @selected($mortgageRent->status == '0')>بسته</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">توضیحات</label>
                                        <textarea class="form-control" name="description" cols="204"
                                        rows="3">{{old('description',$mortgageRent->description)}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <button class="btn btn-warning" type="submit">به روزرسانی</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- col end -->
    </div>
    <!-- row closed -->
@endsection