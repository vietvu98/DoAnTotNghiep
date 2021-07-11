<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="description" content="Mobile Application HTML5 Template">

    <meta name="copyright" content="MACode ID, https://www.macodeid.com/">

    <title>SHTP-Trung tâm đào tạo khu công nghệ cao</title>

    <link rel="shortcut icon" href="{{ asset('public/frontend/assets/logo.png') }}" type="image/x-icon">

    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/assets/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/assets/vendor/owl-carousel/css/owl.carousel.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/mobster.css') }}">

    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />


    <link href="{{ asset ('public/frontend/khonl/css/vendor/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset ('public/frontend/khonl/css/vendor/slick.css') }}" rel="stylesheet" />
    <link href="{{ asset ('public/frontend/khonl/css/vendor/slick-theme.css') }}" rel="stylesheet" />
    <link href="{{ asset ('public/frontend/khonl/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('public/backend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
    type="text/css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <style>
    input[type=radio] {
    border: 2px;
    width: 20px;
    height: 20px;
}
    </style>
 </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-floating">
        <div class="container">
            <a class="navbar-brand" href="{{ URL::to('/gt') }}">
                <img src="{{ asset('public/frontend/assets/logo.png') }}" alt="" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler"
                aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarToggler">
                <ul class="navbar-nav ml-auto mt-3 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ URL::to('/gt') }}">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Đào tạo</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach ($all_daotao as $key=> $value)
                            <a class="dropdown-item" href="{{URL::to('/khoahoc/'.$value->madaotao)}}">{{$value->tendaotao}}</a>

                            @endforeach

                        </div>
                      </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ URL::to('/khonl') }}">Khóa học trực tuyến</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ URL::to('/listexam') }}">Bài kiểm tra tham khảo</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ URL::to('/gioithieu') }}">Giới thiệu</a>
                    </li>

                </ul>
                <?php
                $tentk_user = Session::get('tentk_user');
                if ($tentk_user == null) { ?>
                <div class="ml-auto my-2 my-lg-0">
                    <a href="{{ URL::to('/dangnhap') }}"> <button class="btn btn-primary rounded-pill ">Đăng nhập</button></a>
                </div>
                <?php } else { ?>
                <div class="ml-auto my-2 my-lg-0">
                    <a href=""> <button class="btn btn-primary rounded-pill " style="background-color: azure">
                            <div class="user-area dropdown float-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-user"></i><span class="username">
                                        <?php
                                        echo $tentk_user;

                                        ?>
                                    </span>
                                </a>

                                <div class="user-menu dropdown-menu" >

                                    <a class="nav-link" href="{{URL::to('/user-manager')}}"><i class="fa fa-user"></i> Thông tin </a>



                                    <a class="nav-link" href="{{ URL::to('/dangxuat') }}"><i
                                            class="fa fa-power-off">Đăng
                                            xuất</i> </a>
                                </div>
                            </div>
                        </button></a>
                </div>
                <?php }
                ?>
            </div>
        </div>
    </nav>
    <div class="bg-light">

        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url({{ url('public/frontend/assets/img/hero_mini.svg') }});">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Bài kiểm tra: {{$exam->tenbaitest}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
            <div class="row">
                <?php $i=$temp =0;?>
                @foreach ($dataResult as $key =>$ql )
                <div class="col-sm-12 border border-danger">
                    <!-- radio -->
                <div class="alert alert-success" style="margin-top: 15px; font-size: 20px;  font-weight: bold;">Câu <?php $i++; echo $i;?>:&ensp; <?php echo $ql->cauhoi;?></div>
                    <div class="form-group">

                        <div class="form-check alert alert-light" class="question">
                            <input id="answer" class="form-check-input" type="radio" name="{{$ql->id_cauhoi}}"
                                value="a" <?php if($ql->dapan == 'a'){echo 'checked';} ?>>
                            <label class="form-check-label" name="question"
                                style="font-size: 18px;color:<?php  if($ql->dapan == 'a'){echo '#2ecc71';}
                                                    if($data[$ql->id_cauhoi] == 'a' && $ql->dapan != 'a'){echo 'red';}
                                                     ?>;">
                                    &ensp;<?php echo $ql->luachona?>
                            </label>
                        </div>

                        <div class="form-check alert alert-light" class="question">
                            <input id="answer" class="form-check-input" type="radio" name="{{$ql->id_cauhoi}}"
                                value="b" <?php if($ql->dapan == 'b'){echo 'checked';} ?>>

                            <label class="form-check-label"
                                style="font-size: 18px;color:<?php  if($ql->dapan == 'b'){echo '#2ecc71';}
                                                    if($data[$ql->id_cauhoi] == 'b' && $ql->dapan != 'b'){echo 'red';}
                                                    ?>;">
                                &ensp;<?php echo $ql->luachonb?>
                            </label>
                        </div>

                        <div class="form-check alert alert-light" class="question">
                            <input id="answer" class="form-check-input" type="radio" name="{{$ql->id_cauhoi}}"
                                value="c" <?php if($ql->dapan == 'c'){echo 'checked';} ?>>

                            <label class="form-check-label"
                                style="font-size: 18px;color:<?php  if($ql->dapan == 'c'){echo '#2ecc71';}
                                                    if($data[$ql->id_cauhoi] == 'c' && $ql->dapan != 'c'){echo 'red';}
                                                    ?>;">
                                &ensp;<?php echo $ql->luachonc?>
                            </label>
                        </div>

                        <div class="form-check alert alert-light" class="question">
                            <input id="answer" class="form-check-input" type="radio" name="{{$ql->id_cauhoi}}"
                                value="d" <?php if($ql->dapan == 'd'){echo 'checked';} ?>>

                            <label class="form-check-label"
                                style="font-size: 18px;color:<?php  if($ql->dapan == 'd'){echo '#2ecc71';}
                                                    if($data[$ql->id_cauhoi] == 'd' && $ql->dapan != 'd'){echo 'red';}
                                                    ?>;">
                                &ensp;<?php echo $ql->luachond?>
                            </label>
                        </div>
                    </div>
                </div>
                <?php if($ql->dapan == $data[$ql->id_cauhoi]){$temp++;} ?>
                @endforeach

            </div>
            <div class="alert alert-success" style="text-align:center; margin-top: 15px; border: 2px solid green;">
            <h5>Số câu đúng <?php echo $temp;?> / {{$exam->slcauhoi}}</h5>
            </div>
    </div>
    <div class="page-footer-section bg-dark fg-white">
        <div class="container">
            <div class="row mb-5 py-3">
                <div class="col-sm-6 col-lg-6 py-3">
                    <img src="{{ asset('public/frontend/assets/logo.png') }}" class="mb-3" alt="" style="width:40%">
                    <ul class="menu-link">
                        <li>TRUNG TÂM ĐÀO TẠO KHU CÔNG NGHỆ CAO – THE TRAINING CENTER OF SAIGON HI-TECH PARK </li>
                        <li><strong>Địa chỉ:</strong> Lô E1, Khu Công nghệ cao, Xa lộ Hà Nội, Phường Hiệp Phú, Quận 9, TP.HCM </li>
                        <li> <strong>Điện thoại: </strong>(84-28) 37 360 052 - 37 360 053</li>
                        <li><strong>Email: </strong>contact@shtp-training.edu.vn</li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-4 py-3">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4264636199064!2d106.78374351535652!3d10.855132560702963!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe1eceda934207c2c!2sSaigon%20Hi-Tech%20Park%20Training%20Center!5e0!3m2!1svi!2s!4v1611285799798!5m2!1svi!2s" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                    <!-- Social Media Button -->
                    <div class="mt-4">
                        <a href="https://www.facebook.com/SHTP.Training" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-facebook"></span></a>
                        <a href="https://www.facebook.com/vieclam.shtp/" class="btn btn-fab btn-primary fg-white"><span class="mai-logo-facebook">Job</span></a>

                    </div>
                </div>
            </div>
        </div>

        <hr>


    </div>
    <script src="{{ asset('public/frontend/assets/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/vendor/owl-carousel/js/owl.carousel.min.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ asset('public/frontend/assets/js/mobster.js') }}"></script>

    <script src="{{ asset('public/frontend/khonl/js/vendor/jquery-3.1.0.min.js') }}"></script>
    <script src="{{ asset('public/frontend/khonl/js/vendor/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('public/frontend/khonl/js/vendor/tether.js') }}"></script>
    {{-- <script src="{{ asset('public/frontend/khonl/js/vendor/bootstrap.js') }}"></script> --}}
    <script src="{{ asset('public/frontend/khonl/js/vendor/slick.js') }}"></script>
    <script src="{{ asset('public/frontend/khonl/js/vendor/isotope.pkgd.min.js')}}"></script>
    <script src="{{ asset('public/frontend/khonl/js/main.js') }}"></script>

</body>
</html>

