@extends('admin.layouts.master')

@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i>
                    داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('admin.mortgage-rents.index') }}">لیست
                    ملک های رهن و اجاره</a></li>
            <li class="breadcrumb-item active" aria-current="page">ثبت ملک جدید</li>
        </ol>
    </div>
    <div class="row mx-3">
        <div class="col-md">
            <div class="card overflow-hidden">
                <div class="card-header">
                    <p class="card-title" style="font-size: 15px;">ثبت ملک جدید</p>
                </div>
                <div class="card-body">
                    <x-alert-danger></x-alert-danger>
                    <form action="{{ route('admin.mortgage-rents.store') }}" method="post" class="save"
                        enctype="multipart/form-data">
                        @csrf
                        <div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">محله</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="location_id">
                                            <option selected disabled>- انتخاب کنید  -</option>
                                            @foreach($locations as $location)
                                                <option value="{{$location->id}}">{{$location->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                    <label class="control-label">آدرس</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="آدرس را وارد کنید"
                                            name="address" value="{{old('address')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">امکانات</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="facilities[]" multiple>
                                            @foreach($facilities as $facilitie)
                                                <option value="{{$facilitie->id}}">{{$facilitie->title}}</option>
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
                                            <option selected disabled>- انتخاب کنید  -</option>
                                            @foreach($types as $type)
                                                <option value="{{$type->id}}">{{$type->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">طبقه</label>
                                        <select class="form-control select2" name="floor">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="همکف">همکف</option>
                                            <option value="دوم">دوم</option>
                                            <option value="سوم">سوم</option>
                                            <option value="چهارم">چهارم</option>
                                            <option value="پنجم">پنجم</option>
                                            <option value="ششم">ششم</option>
                                            <option value="هفتم">هفتم</option>
                                            <option value="زیرزمین">زیرزمین</option>
                                            <option value="ندارد">ندارد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">تعداد خواب</label>
                                        <select class="form-control select2" name="num_rooms">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
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
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="independent">مستقل</option>
                                            <option value="common">مشترک</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">پارکینگ</label>
                                        <select class="form-control select2" name="parking">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="1">دارد</option>
                                            <option value="0">ندارد</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">انباری</label>
                                        <select class="form-control select2" name="warehouse">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="1">دارد</option>
                                            <option value="0">ندارد</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">حداکثر تعداد مستاجر</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="tenant">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">موقعیت</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="location_text">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="north">شمالی</option>
                                            <option value="south">جنوبی</option>
                                            <option value="west">غربی</option>
                                            <option value="east">شرقی</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">مبلغ رهن</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="مبلغ رهن را وارد کنید"
                                                name="mortgage_amount" value="{{old('mortgage_amount')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">مبلغ اجاره</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="مبلغ اجاره را وارد کنید"
                                                name="rent_amount" value="{{old('rent_amount')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">متراژ</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="comma form-control" placeholder="متراژ را وارد کنید"
                                                name="area" value="{{old('area')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">مشتری</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="مشتری را وارد کنید"
                                                name="customer" value="{{old('customer')}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">تلفن مشتری</label><span class="text-danger">&starf;</span>
                                        <input type="text" class="form-control" placeholder="تلفن مشتری را وارد کنید "
                                                name="customer_mobile" value="{{old('customer_mobile')}}" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">وضعیت ملک</label><span class="text-danger">&starf;</span>
                                        <select class="form-control select2" name="status">
                                            <option value="" selected disabled>- انتخاب کنید  -</option>
                                            <option value="1">باز</option>
                                            <option value="0">بسته</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label class="control-label">توضیحات</label>
                                        <textarea class="form-control" name="description" cols="204"
                                        rows="3">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    <button class="btn btn-pink" type="submit">ثبت و ذخیره</button>
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