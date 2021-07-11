@extends('welcome')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Thêm bài kiểm tra</strong>
            </div>
            <div class="card-body card-block">
                <form action="{{URL::to('/save-exam')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên bài kiểm tra</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtTenkt"
                                placeholder="Tên bài kiểm tra" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số lượng câu hỏi</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtSl"
                                placeholder="Số lượng câu hỏi" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điểm số</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtDiemso"
                                placeholder="Điểm số" class="form-control" required></div>
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
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Thêm bài kiểm tra
                    </button>
                </form>
            </div>

        </div>

    </div>

@endsection
