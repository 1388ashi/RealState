<div class="col-md-12">
    <div class="card ">
        <div class="card-header">
            <div class="card-title">فیلتر ها</div>
            <div class="card-options">
                <a href="#" class="card-options-collapse" data-toggle="card-collapse"><i
                        class="fe fe-chevron-up"></i></a>
                <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><i
                        class="fe fe-maximize"></i></a>
                <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route("admin.mortgage-rents.index") }}">
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <label>نوع:</label>
                            <select name="type_id" class="form-control">
                                <option value="">همه</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected(request("type_id") == $type->id)>{{ $type->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <label>محله:</label>
                            <select name="location_id" class="form-control">
                                <option value="">همه</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location->id }}" @selected(request("location_id") == $location->id)>{{ $location->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <label>وضعیت :</label>
                            <select name="status" class="form-control">
                                <option value="">همه</option>
                                <option value="0" @selected(request("status") == "0")>بسته</option>
                                <option value="1" @selected(request("status") == "1")>باز</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <label>متراژ :</label>
                            <input type="text" name="area" value="{{ request("area") }}" placeholder="متراژ را انتخاب کنید" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <label>مبلغ رهن تا :</label>
                            <input type="text" name="mortgage_amount"   value="{{ number_format(floatval(request('mortgage_amount', 0))) }}" placeholder="مبلغ مورد نظر را بنویسید" class="form-control comma" />
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-3">
                        <div class="form-group">
                            <label>مبلغ اجاره تا :</label>
                            <input type="text" name="rent_amount" value="{{ number_format(floatval(request("rent_amount"))) }}" placeholder="مبلغ مورد نظر را بنویسید" class="form-control comma" />
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-md-9 mb-2 mb-md-0">  
                        <button class="btn btn-primary btn-block" type="submit">جستجو <i class="fa fa-search"></i></button>
                    </div>

                    <div class="col-12 col-md-3">  
                            <a href="{{ route('admin.mortgage-rents.index') }}"
                                class="btn btn-danger btn-block">حذف همه فیلتر ها <i class="fa fa-close"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>