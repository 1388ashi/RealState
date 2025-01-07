@extends('admin.layouts.master')

@section('content')
    <div class="page-header m-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fe fe-life-buoy ml-1"></i> داشبورد</a></li>
            <li class="breadcrumb-item active" aria-current="page">لیست همه نوع ها</li>
        </ol>
        <div class="mt-3">
            <button data-toggle="modal" data-target="#addType" class="btn btn-indigo">
                ثبت نوع جدید
                <i class="fa fa-plus"></i>
            </button>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="card-title">لیست همه نوع ها ({{ count($types) }})</div>
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
                                    <th class="border-top">عنوان</th>
                                    <th class="border-top">عملیات</th>
                                </tr>
                        </thead>
                        <tbody>
                            @forelse($types as $type)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $type->title }}</td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-sm "
                                    data-toggle="modal"
                                    data-target="#edit-type-{{ $type->id }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm text-white" onclick="confirmDelete('delete-{{ $type->id }}')" data-original-title="حذف" >
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                    <form 
                                        action="{{ route('admin.types.destroy',$type)}}" 
                                        id="delete-{{$type->id}}" 
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
                                        <p class="text-danger"><strong>در حال حاضر هیچ نوع ملکی وجود ندارد!</strong></p>
                                    </td>
                                </tr>
                            @endforelse
                            
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- table-wrapper -->
            </div>
            <!-- section-wrapper -->
        </div>
    </div>
    <!-- row closed -->
    <div class="modal fade"  id="addType">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.types.store')}}" class="save" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="modal-header">
                        <p class="modal-title font-weight-bolder">ثبت نوع جدید</p>
                    <button  class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >عنوان<span class="text-danger">&starf;</span></label>
                        <input type="text" class="form-control" name="title"  placeholder="عنوان را اینجا وارد کنید" value="{{ old('title') }}" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button  class="btn btn-primary  text-right item-right">ثبت</button>
                    <button class="btn btn-outline-danger  text-right item-right" data-dismiss="modal">برگشت</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    @foreach($types as $type)
    <div class="modal fade mt-5" tabindex="-1" id="edit-type-{{ $type->id }}" role="dialog"
        aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{route('admin.types.update', $type->id)}}" method="POST">
                    @csrf
                    @method('PATCH')
                <div class="modal-header">
                    <p class="modal-title font-weight-bolder">ویرایش نوع</p>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label >عنوان<span class="text-danger">&starf;</span></label>
                        <input type="text" class="form-control" name="title" placeholder="عنوان را اینجا وارد کنید" value="{{ old('title', $type->title) }}" required>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button  class="btn btn-warning text-right item-right">به روزرسانی</button>
                    <button class="btn btn-outline-danger  text-right item-right" data-dismiss="modal">برگشت</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection

