@extends('welcome')
@section('admin_content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Thông tin học viên mua khóa học</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên học viên</th>
                                    <th>Khoá học</th>
                                    <th>Chú thích</th>
                                    <th>Ngân hàng</th>
                                    <th>Giá tiền</th>
                                    <th>Ngày</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hvonl as $key => $hv)
                                <tr>
                                    <td>{{$hv->p_hocvien}}</td>
                                    <td>{{$hv->p_khonl}}</td>
                                    <td>{{$hv->p_note}}</td>
                                    <td>{{$hv->p_code_bank}}</td>
                                    <td>{{$hv->p_money}}</td>
                                    <td>{{$hv->created_at}}
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
