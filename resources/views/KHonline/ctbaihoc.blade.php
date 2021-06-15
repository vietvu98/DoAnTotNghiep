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
                                    <li class="breadcrumb-item"><a href="{{ URL::to('/ctkhonl/{makh_onl}') }}">Chi tiết
                                            khoá học trực tuyến</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Bài học trực tuyến</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main>
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 py-3">
                        @foreach ($ctbh as $key => $values)
                            <article class="blog-single-entry">
                                <div class="post-thumbnail"
                                    style="width:1200px; height:650px; display: block; margin-right: 200px;">
                                    {{-- <video controls style="position: relative; width:100%; height:100%">
                                        <source src="{{ URL::to('public/upload/videobaihoc/' . $values->video) }}">
                                    </video> --}}
                                    <video id="my-video" class="video-js" controls preload="auto" style="position: relative; width:100%; height:100%"
                                        poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
                                        <source src="{{ URL::to('public/upload/videobaihoc/' . $values->video) }}" type="video/mp4" />
                                        <source src="MY_VIDEO.webm" type="video/webm" />
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5 video</a>
                                        </p>
                                    </video>
                                </div>
                                <div class="post-date">
                                    Posted on <a href="#">Jan 19, 2020</a>
                                </div>
                                <h1 class="post-title">{!! nl2br($values->tenbh) !!}</h1>
                                <div class="entry-meta mb-4">
                                    <div class="meta-item entry-author">
                                        <div class="icon">
                                            <span class="mai-person"></span>
                                        </div>
                                        by <a href="#">Admin</a>
                                    </div>
                                    <div class="meta-item">
                                        <div class="icon">
                                            <span class="mai-pricetags"></span>
                                        </div>
                                        Category:
                                        <a href="#">Business</a>,
                                        <a href="#">Finances</a>
                                    </div>
                                    <div class="meta-item">
                                        <div class="icon">
                                            <span class="mai-chatbubble-ellipses"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="entry-content" style="background-color: aliceblue; width: 1200px">
                                    <p><?php echo $values->lythuyet?></p>
                                </div>
                            </article>
                        @endforeach

                        <!-- Comments -->
                        <div class="comment-area">
                            <!-- Comment List -->
                            @foreach ($comment as $key => $com)
                            <ul class="comment-list">
                                <li class="comment">
                                  <div class="vcard bio">
                                  <img src="{{ asset('public/frontend/assets/img/person/iron.png') }}" alt="Image placeholder">
                                  </div>
                                  <div class="comment-body">
                                  <h3>{{$com->com_name}}</h3>
                                  <div class="meta">{{date('d/m/Y H:i',strtotime($com->created_at))}}</div>
                                  <p>{{$com->com_content}}</p>
                                  <p><a href="#" class="reply">Reply</a></p>
                                  </div>
                                </li>
                             </ul> <!-- END .comment-list -->
                             @endforeach
                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Viết bình luận của bạn</h3>
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="message">Bình luận *</label>
                                        <textarea name="content" id="message" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Gửi bình luận" class="btn btn-primary">
                                    </div>
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div> <!-- end comment -->
                    </div>
                </div> <!-- .row -->
            </div>
        </div>

    </main>

@endsection
