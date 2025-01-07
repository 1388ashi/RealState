@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>
                    داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.sellings.index') }}">لیست
                    ملک های فروشی</a></li>
            <li class="breadcrumb-item active" aria-current="page">ویرایش ملک</li>
        </ol>
    </div>
    <div class="row mx-3">
        <div class="col-md">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <p class="card-title" style="font-size: 15px;">ویرایش ملک</p>
                </div>
                <div class="card-body">
                    <x-alert-danger></x-alert-danger>
                    <form action="{{ route('admin.sellings.update',$selling->id) }}" method="post" class="save"
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
                                                <option value="{{$location->id}}" @selected($selling->location_id == $location->id)>{{$location->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="control-label">آدرس</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="آدرس را وارد کنید"
                                            name="address" value="{{old('address',$selling->address)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">امکانات</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="facilities[]" multiple>
                                            @foreach($facilities as $facilitie)
                                            <option  value="{{$facilitie->id}}"  @selected(in_array($facilitie->id, 
                                            old('facilities', $selling->facilities->pluck('id')->all())))>{{$facilitie->title}}</option>
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
                                                <option value="{{$type->id}}" @selected($selling->type_id == $type->id)>{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">طبقه</label>
                                        <select class="form-control select2" name="floor">
                                            <option value="همکف" @selected($selling->floor == 'همکف')>همکف</option>
                                            <option value="دوم" @selected($selling->floor == 'دوم')>دوم</option>
                                            <option value="سوم" @selected($selling->floor == 'سوم')>سوم</option>
                                            <option value="چهارم" @selected($selling->floor == 'چهارم')>چهارم</option>
                                            <option value="پنجم" @selected($selling->floor == 'پنجم')>پنجم</option>
                                            <option value="ششم" @selected($selling->floor == 'ششم')>ششم</option>
                                            <option value="هفتم" @selected($selling->floor == 'هفتم')>هفتم</option>
                                            <option value="زیرزمین" @selected($selling->floor == 'زیرزمین')>زیرزمین</option>
                                            <option value="ندارد">ندارد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">تعداد خواب</label>
                                        <select class="form-control select2" name="num_rooms">
                                            <option value="1" @selected($selling->num_rooms == '1')>1</option>
                                            <option value="2" @selected($selling->num_rooms == '2')>2</option>
                                            <option value="3" @selected($selling->num_rooms == '3')>3</option>
                                            <option value="4" @selected($selling->num_rooms == '4')>4</option>
                                            <option value="ندارد">ندارد</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">سند</label>
                                        <select class="form-control select2" name="document">
                                            <option value="دارد" @selected($selling->document == 'دارد')>دارد</option>
                                            <option value="ندارد" @selected($selling->document == 'ندارد')>ندارد</option>
                                            <option value="قولنامه‌ای" @selected($selling->document == 'قولنامه‌ای')>قولنامه‌ای</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">پارکینگ</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="parking">
                                            <option value="1" @selected($selling->parking == '1')>دارد</option>
                                            <option value="0" @selected($selling->parking == '0')>ندارد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">انباری</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="warehouse">
                                            <option value="1" @selected($selling->warehouse == '1')>دارد</option>
                                            <option value="0" @selected($selling->warehouse == '0')>ندارد</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">موقعیت</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="location_text">
                                            <option value="north" @selected($selling->location_text == 'north')>شمالی</option>
                                            <option value="south" @selected($selling->location_text == 'south')>جنوبی</option>
                                            <option value="west" @selected($selling->location_text == 'west')>غربی</option>
                                            <option value="east" @selected($selling->location_text == 'east')>شرقی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">سال ساخت</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="سال ساخت را وارد کنید"
                                                name="year_making" value="{{old('year_making',$selling->year_making)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">قیمت</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="قیمت را وارد کنید"
                                                name="amount" value="{{old('amount',number_format($selling->amount))}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">متراژ</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="متراژ را وارد کنید"
                                                name="area" value="{{old('area',$selling->area)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">زیر بنا</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="زیر بنا را وارد کنید"
                                                name="infrastructure" value="{{old('infrastructure',$selling->infrastructure)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">مشتری</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="مشتری را وارد کنید"
                                                name="customer" value="{{old('customer',$selling->customer)}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">تلفن مشتری</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="تلفن مشتری را وارد کنید "
                                                name="customer_mobile" value="{{old('customer_mobile',$selling->customer_mobile)}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">وضعیت ملک</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="status">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="1" @selected($selling->status == '1')>باز</option>
                                            <option value="0" @selected($selling->status == '0')>بسته</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">توضیحات</label>
                                        <textarea class="form-control" name="description" cols="204"
                                        rows="3">{{old('description',$selling->description)}}</textarea>
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