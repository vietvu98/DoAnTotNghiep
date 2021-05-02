@extends('welcome')
@section('admin_content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Khoá học trực tuyến</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên khoá học</th>
                                    <th>Mô tả</th>
                                    <th>Học phí</th>
                                    <th>Hình ảnh</th>
                                    <th>Tuỳ chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_khonl as $key => $khonl)
                                <tr>
                                    <td>{{$khonl->tenkh_onl}}</td>
                                    <td style="width: 50%">{{$khonl->Mota}} </td>
                                    <td>{{$khonl->hocphi}}</td>
                                    <td><img src="{{URL::to('public/upload/khonlimage/'.$khonl->anhdaidien)}}" alt="" style="width: 70%"></td>
                                    <td><a href="{{URL::to('/edit-khonl/'.$khonl->makh_onl)}}"><i class="fas fa-pen-square"></i></a>
                                        <a href="{{URL::to('/delete-khonl/'.$khonl->makh_onl)}}" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-eraser"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <?php
                        $message = Session::get('message');
                        if($message){
                            echo '<span style="color:red">'.$message.'</span>';
                            Session::put('message',null);
                        }
                    ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
@endsection
