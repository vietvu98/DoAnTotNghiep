@extends('welcome')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Sửa thông tin bài kiểm tra</strong>
            </div>
            <div class="card-body card-block">
                @foreach ($edit_exam as $key => $values)
                <form action="{{URL::to('/update-exam/'.$values->id_baitest)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên bài kiểm tra</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtTenkt" value="{{$values->tenbaitest}}"
                                placeholder="Tên bài kiểm tra" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Số lượng câu hỏi</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtSl" value="{{$values->slcauhoi}}"
                                placeholder="Tên bài kiểm tra" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Thời gian làm bài</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtThoigian" value="{{$values->thoigian}}"
                                placeholder="Thời gian làm bài" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Điểm số</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtDiemso" value="{{$values->diemso}}"
                                placeholder="Điểm số" class="form-control" required></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Đào tạo</label></div>
                        <div class="col-12 col-md-9">
                            <select name="slDaotao" id="select"  class="form-control" >
                                @foreach ($all_daotao as $key => $value)
                                @if($values->madaotao == $value->madaotao)
                                <option value="{{$value->madaotao}}"selected>{{$value->tendaotao}}</option>
                                @else
                                <option value="{{$value->madaotao}}">{{$value->tendaotao}}</option>
                                @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" >
                        <i class="fa fa-dot-circle-o"></i> Sửa bài kiểm
                    </button>
                </form>
                @endforeach

            </div>

        </div>

    </div>

@endsection

