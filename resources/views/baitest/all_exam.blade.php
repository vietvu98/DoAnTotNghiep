@extends('welcome')
@section('admin_content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Danh mục khoá học trực tuyến</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tên bài kiểm tra</th>
                                    <th>Số lượng câu hỏi</th>
                                    <th>Điểm số</th>
                                    <th>Tuỳ chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_exam as $key => $values)
                                <tr>
                                    <td>{{$values->tenbaitest}}</td>
                                    <td>{{$values->slcauhoi}}</td>
                                    <td>{{$values->diemso}}</td>
                                    <td>
                                        <a href="{{URL::to('/view-question/'.$values->id_baitest)}}">  <i class="fas fa-eye"></i></a>
                                        <a href="{{URL::to('/edit-exam/'.$values->id_baitest)}}"><i class="fas fa-pen-square"></i></a>
                                        <a href="{{URL::to('/delete-exam/'.$values->id_baitest)}}" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-eraser"></i></a>
                                    </td>

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
