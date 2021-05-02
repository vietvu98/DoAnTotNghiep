@extends('welcome')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Sửa thông tin khoá học trực tuyến</strong>
            </div>
            <div class="card-body card-block">
                @foreach ($edit_khonl as $key => $edit_values)
                <form action="{{URL::to('/update-khonl/'.$edit_values->makh_onl)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên khoá học</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtTenkhoahoconl" value="{{$edit_values->tenkh_onl}}"
                                placeholder="Tên khoá học" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Mô tả</label></div>
                        <div class="col-12 col-md-9"><textarea name="txtMota"  id="textarea-input" rows="9"
                                placeholder="Mô tả" class="form-control" required>{{$edit_values->Mota}}</textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Học phí</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtHocphionl" value="{{$edit_values->hocphi}}"
                                placeholder="Học phí" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Đào tạo</label></div>
                        <div class="col-12 col-md-9">

                            <select name="slDaotao" id="select" class="form-control">
                                @foreach ($all_daotao as $key => $value)
                                <option value="{{$value->madaotao}}">{{$value->tendaotao}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Hình ảnh</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="imgKhoaHoconl"
                                multiple="" class="form-control-file" required></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" >
                        <i class="fa fa-dot-circle-o"></i> Sửa khoá học trực tuyến
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Huỷ
                    </button>
                </form>
                @endforeach

            </div>

        </div>

    </div>

@endsection
