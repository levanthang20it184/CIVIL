
@extends('layout.master')

@section('title')
<title>Detail </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<link rel="stylesheet" href="{{asset('user/index.css')}}">

@endsection
@section('content')
<main id="main">

 <section class="single-post-content">
  <div class="container">
    <div class="row">
      <div class="col-md-9 post-content" data-aos="fade-up"style="margin-left:300px">

        <!-- ======= Single Post Content ======= -->
        <div class="single-post">
                    <div class="comment d-flex">
                    <div class="flex-shrink-0">
                    <div class="avatar avatar-sm rounded-circle">
                        <img class="avatar-img" src="{{$detailpost->imagesuser->image_user}}" alt="" class="img-fluid">
                    </div>
                    </div>
                    <div class="flex-shrink-1 ms-2 ms-sm-3">
                    <div class="comment-meta d-flex">
                        <h6 class="me-2">{{$detailpost->imagesuser->name}}</h6>
                        <span class="text-muted">4d</span>
                    </div>
                    </div>
          </div>
          <div class="post-meta"><span class="date">Date:</span> <span class="mx-1">&bullet;</span> <span>{{$detailpost->created_at}}</span></div>
          <h1 class="mb-5">{{$detailpost->description}}</h1>
          <p><span class="firstcharacter"></span>{{$detailpost->content}}</p>

          <figure class="my-4"style="margin-left:100px">
            <img style="width: 500px;height:300px;" src="{{$detailpost->image}}" alt="" class="img-fluid">
            <figcaption>{{$detailpost->content}}</figcaption>
          </figure>
          
          
        </div><!-- End Single Post Content -->

        <!-- ======= Comments ======= -->
        <div class="comments">
          <h5 class="comment-title py-4">{{$total}} Comments</h5>
          @foreach($comment as $commentItem)

          <div class="comment d-flex">
            <div class="flex-shrink-0">
              <div class="avatar avatar-sm rounded-circle">
                <img class="avatar-img" src="{{$commentItem->commentuser->image_user}}" alt="" class="img-fluid">
              </div>
            </div>
            <div class="flex-shrink-1 ms-2 ms-sm-3">
              <div class="comment-meta d-flex">
                <h6 class="me-2">{{$commentItem->commentuser->name}}</h6>
                <span class="text-muted">Date:{{$commentItem->created_at}}</span>
              </div>
              <div class="comment-body">
                {{$commentItem->comment}}
              </div>
              <div>
              <a href=""data-url="{{route('comment.delete',['id'=>$commentItem->id])}}"class=" actionDelete"><button class="custom-btn btn-5"><span>Delete</span></button></a>
              </div>
            </div>
          </div>
          @endforeach

        </div><!-- End Comments -->

        <!-- ======= Comments Form ======= -->
        <div class="row justify-content-center mt-5">
            <form action="{{route('comment.store',['id'=>$detailpost->id])}}"method="post" enctype="multipart/form-data">
          <div class="col-lg-12">
            <h5 class="comment-title">Leave a Comment</h5>
            <div class="row">
              <div class="col-lg-6 mb-3">
              @csrf
                <label for="comment-name">Name</label>
                            <div class="comment d-flex">
                                <div class="flex-shrink-0">
                                <div class="avatar avatar-sm rounded-circle">
                                    <img class="avatar-img" src="{{auth()->check()?auth()->user()->image_user:''}}" alt="" class="img-fluid">
                                </div>
                                </div>
                                <div class="flex-shrink-1 ms-2 ms-sm-3">
                                <div class="comment-meta d-flex">
                                    <h6 class="me-2">{{auth()->check()?auth()->user()->name:""}}</h6>
                                </div>
                                
                                </div>
                            </div>
              </div>
              
              <div class="col-12 mb-3">
                <label for="comment-message">Message</label>

                <textarea name="comment" class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
              </div>
              <div class="col-12">
                <input type="submit" class="btn btn-primary" value="Post comment">
              </div>
            </div>
          </div>
            </form>
        </div><!-- End Comments Form -->

      </div>
    </div>
  </div>
</section>
</main><!-- End #main -->

@endsection

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('user/delete.js')}}"></script>
@endsection