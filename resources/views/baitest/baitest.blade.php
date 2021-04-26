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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Test</div>

                    <div class="card-body">
                        @if(session('status'))
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('client.test.store') }}">
                            @csrf
                            @foreach($categories as $category)
                                <div class="card mb-3">
                                    <div class="card-header">{{ $category->name }}</div>

                                    <div class="card-body">
                                        @foreach($category->categoryQuestions as $question)
                                            <div class="card @if(!$loop->last)mb-3 @endif">
                                                <div class="card-header">{{ $question->question_text }}</div>

                                                <div class="card-body">
                                                    <input type="hidden" name="questions[{{ $question->id }}]" value="">
                                                    @foreach($question->questionOptions as $option)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="questions[{{ $question->id }}]" id="option-{{ $option->id }}" value="{{ $option->id }}"@if(old("questions.$question->id") == $option->id) checked @endif>
                                                            <label class="form-check-label" for="option-{{ $option->id }}">
                                                                {{ $option->option_text }}
                                                            </label>
                                                        </div>
                                                    @endforeach

                                                    @if($errors->has("questions.$question->id"))
                                                        <span style="margin-top: .25rem; font-size: 80%; color: #e3342f;" role="alert">
                                                            <strong>{{ $errors->first("questions.$question->id") }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                            <div class="form-group row mb-0">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
