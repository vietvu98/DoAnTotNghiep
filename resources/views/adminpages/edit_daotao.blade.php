@extends('welcome')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Sửa đào tạo</strong>
            </div>
            <div class="card-body card-block">
                @foreach ($all_daotao as $key => $value)
                <form action="{{URL::to('/update-daotao/'.$value->madaotao)}}" method="post"  class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tên đào tạo</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" name="txtTendaotao" value="{{$value->tendaotao}}"
                                placeholder="Tên khoá học" class="form-control" required></div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Sửa đào tạo
                    </button>
                </form>
                @endforeach

            </div>

        </div>

    </div>

@endsection
