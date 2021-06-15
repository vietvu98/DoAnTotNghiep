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
                                    <th>Tên bài học</th>
                                    <th>Lý thuyết</th>
                                    <th>Video</th>
                                    <th>Tuỳ chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($all_baihoc as $key => $baihoc)
                                <tr>
                                    <td>{{$baihoc->tenbh}}</td>
                                    <td style="width: 100%; display: -webkit-box;
                                    line-height: 25px;
                                    overflow: hidden;
                                    text-overflow: ellipsis;
                                    -webkit-line-clamp: 4;
                                    -webkit-box-orient: vertical;" >
                                        <?php echo $baihoc->lythuyet?>
                                    </td>
                                    <td><a href="{{URL::to('public/upload/videobaihoc/'.$baihoc->video)}}" alt="" style="width: 50%">Xem</a></td>
                                    {{-- <video controls>
                                        <source src="{{URL::to('public/upload/videobaihoc/'.$baihoc->video)}}">
                                    </video> --}}
                                    <td><a href="{{URL::to('/edit-baihoc/'.$baihoc->mabh)}}"><i class="fas fa-pen-square"></i></a>
                                        <a href="{{URL::to('/delete-baihoc/'.$baihoc->mabh)}}" onclick="return confirm('Are you sure to delete?')"><i class="fas fa-eraser"></i></a></td>
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
