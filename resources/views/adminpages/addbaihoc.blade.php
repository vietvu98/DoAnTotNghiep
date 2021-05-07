@extends('welcome')
@section('admin_content')
{{-- https://www.youtube.com/watch?v=0JiP8jSFT3E
    https://stackoverflow.com/questions/40138976/how-to-upload-video-with-laravel
    --}}
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Thêm bài học trực tuyến</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{URL::to('/save-baihoc')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên bài học</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtTenbaihoc"
                                placeholder="Tên bài học" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Lý thuyết</label></div>
                        <div class="col-12 col-md-9"><textarea name="txtLythuyet" id="ckeditor4"
                                placeholder="Lý thuyết" class="form-control" required></textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Khóa học online</label></div>
                        <div class="col-12 col-md-9">

                            <select name="slkhonl" id="select" class="form-control">
                                @foreach ($all_khonl as $key => $value)
                                <option value="{{$value->makh_onl}}">{{$value->tenkh_onl}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-multiple-input" class=" form-control-label">Upload video</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="file-multiple-input" name="videoBaihoc"
                                multiple="" class="form-control-file" required></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" >
                        <i class="fa fa-dot-circle-o"></i> Thêm bài học trực tuyến
                    </button>
                    <a type="reset" class="btn btn-danger btn-sm"href="{{URL::to('/huy-baihoc')}}">
                        <i class="fa fa-ban"></i> Huỷ
                    </a>
                </form>
            </div>

        </div>

    </div>

@endsection
