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
                                <div class="post-thumbnail" style="width:1200px; height:650px; display: block; margin-right: 200px;">
                                    <video controls style="position: relative; width:100%; height:100%">
                                        <source src="{{URL::to('public/upload/videobaihoc/'.$values->video)}}">
                                    </video>
                                </div>
                                <div class="post-date">
                                    Posted on <a href="#">Jan 19, 2020</a>
                                </div>
                                <h1 class="post-title">Duis feugiat neque sed dolor cursus, sed lacinia nisl pretium</h1>
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
                                        <a href="#">24 Comments</a>
                                    </div>
                                </div>
                                <div class="entry-content">
                                    <p>{!! nl2br($values->Mota) !!}</p>
                                </div>
                            </article>
                        @endforeach

                        <!-- Comments -->
                        <div class="comment-area">
                            <h3 class="mb-5">6 Comments</h3>
                            <!-- Comment List -->
                            <ul class="comment-list">
                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="../assets/img/person/person_1.png" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Jacob Smith</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                            their default model text, and a search for 'lorem ipsum' will uncover many web
                                            sites still in their infancy.</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>
                                </li>

                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="../assets/img/person/person_2.png" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Chris Meyer</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as
                                            their default model text, and a search for 'lorem ipsum' will uncover many web
                                            sites still in their infancy.</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>

                                    <ul class="children">
                                        <li class="comment">
                                            <div class="vcard bio">
                                                <img src="../assets/img/person/person_3.png" alt="Image placeholder">
                                            </div>
                                            <div class="comment-body">
                                                <h3>Chintan Patel</h3>
                                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                                <p>Many desktop publishing packages and web page editors now use Lorem Ipsum
                                                    as their default model text, and a search for 'lorem ipsum' will uncover
                                                    many web sites still in their infancy.</p>
                                                <p><a href="#" class="reply">Reply</a></p>
                                            </div>

                                            <ul class="children">
                                                <li class="comment">
                                                    <div class="vcard bio">
                                                        <img src="../assets/img/person/person_2.png"
                                                            alt="Image placeholder">
                                                    </div>
                                                    <div class="comment-body">
                                                        <h3>Jean Doe</h3>
                                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                                        <p>Various versions have evolved over the years, sometimes by
                                                            accident, sometimes on purpose (injected humour and the like).
                                                        </p>
                                                        <p><a href="#" class="reply">Reply</a></p>
                                                    </div>

                                                    <ul class="children">
                                                        <li class="comment">
                                                            <div class="vcard bio">
                                                                <img src="../assets/img/person/person_1.png"
                                                                    alt="Image placeholder">
                                                            </div>
                                                            <div class="comment-body">
                                                                <h3>Ben Afflick</h3>
                                                                <div class="meta">January 9, 2018 at 2:21pm</div>
                                                                <p>Many desktop publishing packages and web page editors now
                                                                    use Lorem Ipsum as their default model text, and a
                                                                    search for 'lorem ipsum' will uncover many web sites
                                                                    still in their infancy.</p>
                                                                <p><a href="#" class="reply">Reply</a></p>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>

                                <li class="comment">
                                    <div class="vcard bio">
                                        <img src="../assets/img/person/person_3.png" alt="Image placeholder">
                                    </div>
                                    <div class="comment-body">
                                        <h3>Jean Doe</h3>
                                        <div class="meta">January 9, 2018 at 2:21pm</div>
                                        <p>Various versions have evolved over the years, sometimes by accident, sometimes on
                                            purpose (injected humour and the like).</p>
                                        <p><a href="#" class="reply">Reply</a></p>
                                    </div>
                                </li>
                            </ul> <!-- END .comment-list -->

                            <div class="comment-form-wrap pt-5">
                                <h3 class="mb-5">Leave a comment</h3>
                                <form action="#" class="">
                                    <div class="form-row form-group">
                                        <div class="col-md-6">
                                            <label for="name">Name *</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="email">Email *</label>
                                            <input type="email" class="form-control" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="website">Website</label>
                                        <input type="url" class="form-control" id="website">
                                    </div>

                                    <div class="form-group">
                                        <label for="message">Message</label>
                                        <textarea name="msg" id="message" cols="30" rows="10"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Post Comment" class="btn btn-primary">
                                    </div>
                                </form>
                            </div>
                        </div> <!-- end comment -->
                    </div>

                    <!-- Sidebar -->
                    {{-- <div class="col-lg-4 py-3">
                        <div class="widget-wrap">
                            <h3 class="widget-title">Recent Blog</h3>
                            <div class="blog-widget">
                                <div class="blog-img">
                                    <img src="../assets/img/blogs/blog_1.jpg" alt="">
                                </div>
                                <div class="entry-footer">
                                    <div class="blog-title mb-2"><a href="#">Duis feugiat neque sed dolor cursus, sed
                                            lacinia nisl pretium</a></div>
                                    <div class="meta">
                                        <a href="#"><span class="icon-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="icon-person"></span> Admin</a>
                                        <a href="#"><span class="icon-chat"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-widget">
                                <div class="blog-img">
                                    <img src="../assets/img/blogs/blog_2.jpg" alt="">
                                </div>
                                <div class="entry-footer">
                                    <div class="blog-title mb-2"><a href="#">Duis feugiat neque sed dolor cursus, sed
                                            lacinia nisl pretium</a></div>
                                    <div class="meta">
                                        <a href="#"><span class="icon-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="icon-person"></span> Admin</a>
                                        <a href="#"><span class="icon-chat"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-widget">
                                <div class="blog-img">
                                    <img src="../assets/img/blogs/blog_3.jpg" alt="">
                                </div>
                                <div class="entry-footer">
                                    <div class="blog-title mb-2"><a href="#">Duis feugiat neque sed dolor cursus, sed
                                            lacinia nisl pretium</a></div>
                                    <div class="meta">
                                        <a href="#"><span class="icon-calendar"></span> July 12, 2018</a>
                                        <a href="#"><span class="icon-person"></span> Admin</a>
                                        <a href="#"><span class="icon-chat"></span> 19</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end sidebar --> --}}

                </div> <!-- .row -->
            </div>
        </div>

    </main>

@endsection
