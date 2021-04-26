@extends('welcomeuser')
@section('user_content')
<div class="bg-light">

    <div class="page-hero-section bg-image hero-mini"
        style="background-image: url({{ url('public/frontend/assets/img/hero_mini.svg') }});">
        <div class="hero-caption">
            <div class="container fg-white h-100">
                <div class="row justify-content-center align-items-center text-center h-100">
                    <div class="col-lg-6">
                        <h3 class="mb-4 fw-medium">Khóa học trực tuyến</h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                <li class="breadcrumb-item"><a href="{{ URL::to('/gt') }}">Trang chủ</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Khóa học trực tuyến</li>
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
                    <div class="row">
                        <div class="col-md-7">
                            <div class="single-portfolio--slider">
                                <div>
                                    <img src="{{asset('public/frontend/khonl/assets/img/services.png')}}" alt="">
                                </div>
                                <div>
                                    <img src="{{asset('public/frontend/khonl/assets/img/services.png')}}" alt="">
                                </div>
                                <div>
                                    <img src="{{asset('public/frontend/khonl/assets/img/services.png')}}" alt="">
                                </div>
                            </div>
                            <div class="single-portfolio--slider__dots"></div>
                        </div>
                        <div class="col-md-5">
                            <h2>Lorem Ipsum</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <ul>
                                <li>
                                    <span>Categories</span>
                                    Web Development
                                </li>
                                <li>
                                    <span>Client</span>
                                    Rubik Technologies
                                </li>
                                <li>
                                    <span>Technologies</span>
                                    HTML, JS, CSS3
                                </li>
                            </ul>
                            <a href="#" class="button">Visit Project</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
@endsection
