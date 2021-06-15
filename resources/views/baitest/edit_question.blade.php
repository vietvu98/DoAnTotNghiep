@extends('welcome')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong>Sửa câu hỏi</strong>
            </div>
            <div class="card-body card-block">
                @foreach ($question as $key => $edit_values)
                <form action="{{URL::to('/update-question/'.$edit_values->id_cauhoi)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="row form-group">
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="cauhoi"
                         class="form-control" required value="{{$edit_values->cauhoi}}"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Lựa chọn A</label></div>
                        <div class="custom-control custom-radio">
                            <?php
                                if ($edit_values->dapan == 'a'){
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" checked value="a" id="customRadio1">';
                                }else{
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" value="a" id="customRadio1">';
                                }
                                ?>

                            <label for="customRadio1" class="custom-control-label" >Đáp án đúng</label><br>
                        </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="luachona"
                        class="form-control" required value="{{$edit_values->luachona}}"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Lựa chọn B</label></div>
                        <div class="custom-control custom-radio">
                            <?php
                                if ($edit_values->dapan == 'b'){
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" checked value="b" id="customRadio2">';
                                }else{
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" value="b" id="customRadio2">';
                                }
                                ?>

                            <label for="customRadio2" class="custom-control-label" >Đáp án đúng</label><br>
                        </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="luachonb"
                        class="form-control" required value="{{$edit_values->luachonb}}"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Lựa chọn C</label></div>
                        <div class="custom-control custom-radio">
                            <?php
                                if ($edit_values->dapan == 'c'){
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" checked value="c" id="customRadio3">';
                                }else{
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" value="c" id="customRadio3">';
                                }
                                ?>

                            <label for="customRadio3" class="custom-control-label" >Đáp án đúng</label><br>
                        </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="luachonc"
                         class="form-control" required value="{{$edit_values->luachonc}}"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Lựa chọn D</label></div>
                        <div class="custom-control custom-radio">
                            <?php
                                if ($edit_values->dapan == 'd'){
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" checked value="d" id="customRadio4">';
                                }else{
                                    echo ' <input class="custom-control-input" type="radio" name="dapan" value="d" id="customRadio4">';
                                }
                                ?>

                            <label for="customRadio4" class="custom-control-label" >Đáp án đúng</label><br>
                        </div>
                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="luachond"
                         class="form-control" required value="{{$edit_values->luachond}}"></div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" >
                        <i class="fa fa-dot-circle-o"></i> Lưu
                    </button>
                </form>
                @endforeach

            </div>

        </div>

    </div>

@endsection

