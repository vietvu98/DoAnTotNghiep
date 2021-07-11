@extends('welcomeuser')
@section('user_content')
    <div class="bg-light">

        <div class="page-hero-section bg-image hero-mini"
            style="background-image: url({{ url('public/frontend/assets/img/hero_mini.svg') }});">
            <div class="hero-caption">
                <div class="container fg-white h-100">
                    <div class="row justify-content-center align-items-center text-center h-100">
                        <div class="col-lg-6">
                            <h3 class="mb-4 fw-medium">Danh sách bài giảng</h3>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb breadcrumb-dark justify-content-center bg-transparent">
                                    <li class="breadcrumb-item"><a href="{{url()->previous()}}">Chi tiết
                                            khoá học trực tuyến</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Danh sách bài giảng</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card-page">
                        <h5 class="fg-primary">Danh sách bài học</h5>
                        <hr>
                        <ul class="theme-list">
                            @foreach ($all_baihoc as $key => $values)
                                <li class="list-item"><a href="{{ URL::to('/ctbaihoc/'. $values->mabh) }}">{{ $values->tenbh }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
