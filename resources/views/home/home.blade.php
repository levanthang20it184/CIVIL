
@extends('layout.master')
@section('title')
<title>CIVIL</title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
  padding: 10px;
}
.grid-item {
  background-color: rgba(255, 255, 255, 0.8);
  border: 3px solid rgba(0, 0, 0, 0.8);
  padding: 20px;
  font-size: 30px;
  text-align: center;
}
</style>
@endsection
@section('js')
<link rel="stylesheet" href="{{asset('home/home.js')}}">
@endsection


@section('content')


  <main id="main">

    <!-- ======= Hero Slider Section ======= -->
    <section id="hero-slider" class="hero-slider">
      <div class="container-md" data-aos="fade-in">
        <div class="row">
          <div class="col-12">
            <div class="swiper sliderFeaturedPosts">
              <div class="swiper-wrapper">
              @foreach($slider as $sliderItem)

                <div class="swiper-slide">
                  <a href="#" class="img-bg d-flex align-items-end" style="background-image: url('{{$sliderItem->image_path}}');">
                    <div class="img-bg-inner">
                      <h2>{{$sliderItem->name}}</h2>
                      <p>{{$sliderItem->description}}</p>
                    </div>
                  </a>
                </div>
              @endforeach
                
              </div>
              <div class="custom-swiper-button-next">
                <span class="bi-chevron-right"></span>
              </div>
              <div class="custom-swiper-button-prev">
                <span class="bi-chevron-left"></span>
              </div>

              <div class="swiper-pagination"></div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Slider Section -->

    <!-- ======= Post Grid Section ======= -->
    <section id="posts" class="posts">
      <div class="container" data-aos="fade-up">
        <div class="row g-5">
          <div class="col-lg-4">
            <div class="post-entry-1 lg">
              <h2><a href="single-post.html">List User</a></h2>
              @foreach($user as $userItem)
              
                <div class="col-lg-6 text-center mb-5">
                  <img src="{{$userItem->image_user}}" alt="" class="img-fluid rounded-circle w-50 mb-4">
                  <h4>{{$userItem->name}}</h4>
                  <span class="d-block mb-3 text-uppercase">Founder &amp; CEO</span>
                  <div class="post-meta"><span class="date">Date:</span> <span class="mx-1">&bullet;</span> <span>{{$userItem->created_at}}</span></div>
                </div>
              @endforeach

            </div>

          </div>

          <div class="col-lg-8">
            <div class="row">
              @foreach($post as $postItem)
              <div class="col-lg-4">
                <div class="post-entry-1">
                  <a href="{{route('post.detail',['id'=>$postItem->id])}}"><img style="width: 300px;height;150px" src="{{$postItem->image}}" alt="" class="img-fluid"></a>
                  <div class="post-meta"><span class="date">{{$postItem->description}}</span> <span class="mx-1">&bullet;</span> <span>Date:{{$postItem->created_at}}</span></div>
                  <h2><a href="{{route('post.detail',['id'=>$postItem->id])}}">{{$postItem->content}}</a></h2>
                </div>
              </div>
              @endforeach
              
            </div>
            <div class="col-lg-8">{{$post->links()}}</div>

          </div>

        </div> <!-- End .row -->
      </div>
    </section> <!-- End Post Grid Section -->

    <!-- ======= Culture Category Section ======= -->
    <section class="category-section">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5" >
          <h2>New Post</h2>
        </div>

        <div class="row" style="padding:100px">
          <div class="col-md-12">

            <div class="d-lg-flex post-entry-2">
              <a href="{{route('post.detail',['id'=>$postnew->id])}}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="{{$postnew->image}}" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">Date:</span> <span class="mx-1">&bullet;</span> <span>{{$postnew->created_at}}</span></div>
                <h3><a href="{{route('post.detail',['id'=>$postnew->id])}}">{{$postnew->description}}</a></h3>
                <p>{{$postnew->content}}</p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="{{$postnew->imagesuser->image_user}}" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">{{$postnew->imagesuser->name}}</h3>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section><!-- End Culture Category Section -->


  </main><!-- End #main -->


  

  <a href="#" style="background:#19070B" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@endsection
