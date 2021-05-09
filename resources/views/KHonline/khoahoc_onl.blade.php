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
     <section class="recent-works">
         <div class="container">
             <h2>Danh sách khóa học trực tuyến</h2>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
             <span class="dot-dash dark">.</span>
             <div class="recent-works--nav">

                 <ol class="breadcrumb justify-content-center bg-transparent" style="outline-color: red; font-weight: bolder" >
                     <li class="breadcrumb-item active" style="color: aqua"  ><a href="{{URL::to('/khonl')}}">All Items</a></li>
                     @foreach ($all_daotao as $key => $value)
                     <li class="breadcrumb-item active"  style="color: aqua"><a href="{{URL::to('/khonl/'.$value->madaotao)}}">{{$value->tendaotao}}</a></li>
                     {{-- <li data-filter=".animation"value="{{$value->madaotao}}">{{$value->tendaotao}}</li>
                     <li data-filter=".art"value="{{$value->madaotao}}">{{$value->tendaotao}}</li>
                     <li data-filter=".web"value="{{$value->madaotao}}">{{$value->tendaotao}}</li>
                     <li data-filter=".photo"value="{{$value->madaotao}}">{{$value->tendaotao}}</li>
                     <li data-filter=".video"value="{{$value->madaotao}}">{{$value->tendaotao}}</li> --}}
                     @endforeach

                 </ol>

             </div>
         </div>
         <div class="recent-works--items">
             {{-- <div class="recent-works--items__item web">
                @foreach ($all_onl as $key => $edit_values)
                 <a href="{{ URL::to('/ctkhonl') }}">
                    <img src="{{ URL::to('/public/upload/khonlimage/' . $edit_values->anhdaidien) }}"
                    alt="">
                     <div class="inner-item">
                         <div>
                             <h4>{{$edit_values->tenkh_onl}}</h4>
                             <p>{{$edit_values->hocphi}}</p>
                         </div>
                     </div>
                 </a>
                 @endforeach
             </div> --}}
             @foreach ($all_onl as $key => $edit_values1)
         <div class="recent-works--items__item print">

                 <a href="{{ URL::to('/ctkhonl/'.$edit_values1->makh_onl) }}">
                    <img style=" width:475.5px; height:300px" src="{{ URL::to('/public/upload/khonlimage/' . $edit_values1->anhdaidien) }}"
                    alt="">
                     <div class="inner-item">
                         <div>
                             <h4>{{$edit_values1->tenkh_onl}}</h4>
                             <p>{{$edit_values1->hocphi}}</p>
                         </div>
                     </div>
                 </a>

             </div>
             @endforeach
             {{-- <div class="recent-works--items__item art">
                 <a href="{{ URL::to('/ctkhonl') }}">
                     <img src="{{asset('public/frontend/khonl/assets/img/3.jpg')}}" alt="">
                     <div class="inner-item">
                         <div>
                             <h4>T-Shirt Design</h4>
                             <p>art / t-shirt</p>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="recent-works--items__item web">
                 <a href="{{ URL::to('/ctkhonl') }}">
                     <img src="{{asset('public/frontend/khonl/assets/img/4.jpg')}}" alt="">
                     <div class="inner-item">
                         <div>
                             <h4>T-Shirt Design</h4>
                             <p>art / t-shirt</p>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="recent-works--items__item print">
                 <a href="{{ URL::to('/ctkhonl') }}">
                     <img src="{{asset('public/frontend/khonl/assets/img/4.jpg')}}" alt="">
                     <div class="inner-item">
                         <div>
                             <h4>T-Shirt Design</h4>
                             <p>art / t-shirt</p>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="recent-works--items__item web">
                 <a href="{{ URL::to('/ctkhonl') }}">
                     <img src="{{asset('public/frontend/khonl/assets/img/3.jpg')}}" alt="">
                     <div class="inner-item">
                         <div>
                             <h4>T-Shirt Design</h4>
                             <p>art / t-shirt</p>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="recent-works--items__item web">
                 <a href="{{ URL::to('/ctkhonl') }}">
                     <img src="{{asset('public/frontend/khonl/assets/img/4.jpg')}}" alt="">
                     <div class="inner-item">
                         <div>
                             <h4>T-Shirt Design</h4>
                             <p>art / t-shirt</p>
                         </div>
                     </div>
                 </a>
             </div>
             <div class="recent-works--items__item art">
                 <a href="{{ URL::to('/ctkhonl') }}">
                     <img src="{{asset('public/frontend/khonl/assets/img/3.jpg')}}" alt="">
                     <div class="inner-item">
                         <div>
                             <h4>T-Shirt Design</h4>
                             <p>art / t-shirt</p>
                         </div>
                     </div>
                 </a>
             </div> --}}
         </div>
     </section>

     <section class="partners">
         <div class="container">
             <h2>Great Integrations with Others</h2>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
             <span class="dot-dash dark">.</span>
             <div class="partners--container">
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
                 <div class="partners--item">
                     <div class="partners--item__image">
                         <img src="assets/img/partner1.png" alt="">
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <section class="get-started">
         <div class="container">
             <h2>Let's Get Started Now. It's FREE!</h2>
             <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
             <a href="contact.html" class="button">Start Free Trial</a>
         </div>
     </section>
 </div>
@endsection
