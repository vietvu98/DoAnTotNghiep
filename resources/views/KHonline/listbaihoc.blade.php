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
                                <li class="breadcrumb-item"><a href="{{ URL::to('/ctkhonl/{makh_onl}') }}">Chi tiết khoá học trực tuyến</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Bài học trực tuyến</li>
                            </ol>
                        </nav>
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
            <h5 class="fg-primary">Stories</h5>
            <hr>
            <ul class="theme-list">
                <li class="list-item">New parental controls provide more communication limits over who their children can call, FaceTime, or Message</li>
                <li class="list-item">Contact list for children lets parents manage the contacts that appear on their children’s devices</li>
              </ul>
        </div>
      </div>
    </div>
  </div>
@endsection
