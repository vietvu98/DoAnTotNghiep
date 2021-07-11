@extends('welcomeuser')
@section('user_content')
    <div class="bg-light">

        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url({{ url('public/frontend/assets/img/hero_mini.svg') }});">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Chi tiết khoá học</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="{{ URL::to('/khonl/') }}">Khoá học trực tuyến</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Chi tiết khoá học trực tuyến</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <article>
                <div class="container">
                    <div class="single-portfolio">
                        @foreach ($ctkh_onl as $key => $values)
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="single-portfolio--slider">
                                        <div>
                                            <img style="height: 478px; box-shadow: 0 8px 6px -6px black;border-radius:25px;" src="{{ URL::to('/public/upload/khonlimage/' . $values->anhdaidien) }}">
                                        </div>
                                        {{-- <div>
                                    <img src="{{asset('public/frontend/khonl/assets/img/services.png')}}" alt="">
                                </div>
                                <div>
                                    <img src="{{asset('public/frontend/khonl/assets/img/services.png')}}" alt="">
                                </div> --}}
                                    </div>
                                    <div class="single-portfolio--slider__dots"></div>
                                </div>
                                <div class="col-md-5">
                                    <h2>{{ $values->tenkh_onl }}</h2>
                                    <p>Mời bạn tham khảo Khóa học</p>
                                    <ul>
                                        <li>
                                <div id="accordion">
                                <a href="" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Mô tả khóa học
                                </a>
                                <div class="card">
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                {!! nl2br($values->Mota) !!}
                                </div>
                                </div>
                                </div>
                                </div>
                                        </li>
                                        <li style="margin-top: 80px;">
                                            <span>Chuyên ngành</span>
                                            <p> {{ $values->tendaotao }}</p>
                                        </li>
                                    </ul>
                                    {{-- <a href={{ URL::to('/payment/') }}><button class="btntt btntt-primary"> --}}

                                            @if ($values->hocphi == 0)
                                            <a href={{ URL::to('/listbaihoc/'.$values->makh_onl) }}><button class="btntt btntt-primary">
                                            <div class="btn-cube1" style="margin-top: 20px;">
                                                <span>Miễn phí</span>
                                                <span>Học ngay</span>
                                            </div> </button></a>
                                            @else
                                            <?php
                                            $xacnhantt = Session::get('xacnhantt');
                                            ?>
                                            @if ($xacnhantt)
                                            <a href={{ URL::to('/listbaihoc/'.$values->makh_onl) }}><button class="btntt btntt-primary">
                                                <div class="btn-cube1">
                                                    <span>Đã thanh toán</span>
                                                    <span>Học ngay</span>
                                                </div> </button></a>
                                            @else
                                            <a href={{ URL::to('/payment/'. $values->makh_onl) }}><button class="btntt btntt-primary" name="payment">
                                                {{-- <a href={{ URL::to('/listbaihoc/'.$values->makh_onl) }}><button class="btntt btntt-primary"> --}}
                                                <div class="btn-cube1">
                                                    <span>{{number_format($values->hocphi,0,',','.')}}VND</span>
                                                <span>Thanh toán</span>
                                                </div> </button></a>
                                            @endif
                                            @endif

                                </div>
                        @endforeach
                    </div>
                </div>
        </div>
        </article>
    @endsection
