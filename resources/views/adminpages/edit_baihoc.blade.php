@extends('welcome')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Sửa thông tin khoá học trực tuyến</strong>
            </div>
            <div class="card-body card-block">
                @foreach ($edit_baihoc as $key => $edit_values)
                <form action="{{URL::to('/update-baihoc/'.$edit_values->mabh)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên bài học</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtTenbaihoc" value="{{$edit_values->tenbh}}"
                                placeholder="Tên bài học" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Lý thuyết</label></div>
                        <div class="col-12 col-md-9"><textarea name="txtLythuyet" id="ckeditor4"
                                placeholder="Mô tả" class="form-control" required> {{$edit_values->lythuyet}}</textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Khóa học online</label></div>
                        <div class="col-12 col-md-9">
                                <select name="slkhonl" id="select"  class="form-control" >
                                    @foreach ($all_khonl as $key => $value)
                                    @if($edit_values->makh_onl == $value->makh_onl)
                                    <option value="{{$value->makh_onl}}"selected>{{$value->tenkh_onl}}</option>
                                    @else
                                    <option value="{{$value->makh_onl}}">{{$value->tenkh_onl}}</option>
                                    @endif
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Upload video</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="videoBaihoc"
                                multiple="" class="form-control-file" required>
                                <a href="{{URL::to('public/upload/videobaihoc/'.$edit_values->video)}}" alt="" style="width: 50%">Xem</a>
                            </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" >
                        <i class="fa fa-dot-circle-o"></i> Sửa bài học trực tuyến
                    </button>
                </form>
                @endforeach

            </div>

        </div>

    </div>

@endsection
