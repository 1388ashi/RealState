@extends('admin.layouts.master')

@section('content')
<div class="page-header m-0">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i> داشبورد</a></li>
    </ol>
</div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header  border-0">
                    <div class="card-title">جدول ها</div>
                </div>
                <div class="card-body row justify-content-center">
                    <a style="border: 1px solid #dadada;border-radius: 15px;box-shadow: 0 0 10px #dadada;padding: 3rem 1.5rem;" 
                    class="col-md-3 slider-group text-center ml-4"
                        href="{{route('admin.sellings.index')}}">
                        <p style="font-size: 17px;font-weight: 300;" class="d-block my-3 font-bold">فروش ملک</p>
                    </a>
                    <a style="border: 1px solid #dadada;border-radius: 15px;box-shadow: 0 0 10px #dadada;padding: 3rem 1.5rem;" 
                    class="col-md-3 slider-group text-center ml-4"
                        href="{{route('admin.mortgage-rents.index')}}">
                        <p style="font-size: 17px;font-weight: 300;" class="d-block my-3 font-bold">رهن و اجاره‌ی ملک</p>
                    </a>
                </div>
                <div class="card-body row justify-content-center">
                    <a style="border: 1px solid #dadada;border-radius: 15px;box-shadow: 0 0 10px #dadada;padding: 3rem 1.5rem;" 
                    class="col-md-3 slider-group text-center ml-4"
                        href="{{route('admin.types.index')}}">
                        <p style="font-size: 17px;font-weight: 300;" class="d-block my-3 font-bold">نوع ملک</p>
                    </a>
                    <a style="border: 1px solid #dadada;border-radius: 15px;box-shadow: 0 0 10px #dadada;padding: 3rem 1.5rem;" 
                    class="col-md-3 slider-group text-center ml-4"
                        href="{{route('admin.locations.index')}}">
                        <p style="font-size: 17px;font-weight: 300;" class="d-block my-3 font-bold">محله ها</p>
                    </a>
                    <a style="border: 1px solid #dadada;border-radius: 15px;box-shadow: 0 0 10px #dadada;padding: 3rem 1.5rem;" 
                    class="col-md-3 slider-group text-center ml-4"
                        href="{{route('admin.facilities.index')}}">
                        <p style="font-size: 17px;font-weight: 300;" class="d-block my-3 font-bold">امکانات</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
