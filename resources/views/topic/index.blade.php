
@extends('layout.master')

@section('title')
<title>Topic </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<style>
  .custom-btn {
  width: 130px;
  height: 40px;
  color: #fff;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: 'Lato', sans-serif;
  font-weight: 500;
  text-align: center;

  background: transparent;
  cursor: pointer;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
   box-shadow:inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
}


.btn-5 {
  width: 130px;
  height: 40px;
  line-height: 42px;
  padding: 10px;

  color: #070B19;
  border: none;
  background: rgb(255,27,0);
background: linear-gradient(0deg, rgba(0,255,43,1) 0%, rgba(251,75,2,1) 100%);
}
.btn-5:hover {
  color: #f0094a;
  background: transparent;
   box-shadow:none;
}
.btn-5:before,
.btn-5:after{
  content:'';
  position:absolute;
  top:0;
  right:0;
  height:2px;
  width:0;
  background: #FF0040;
  box-shadow:
   -1px -1px 5px 0px #fff,
   7px 7px 20px 0px #0003,
   4px 4px 5px 0px #0002;
  transition:400ms ease all;
}
.btn-5:after{
  right:inherit;
  top:inherit;
  left:0;
  bottom:0;
}
.btn-5:hover:before,
.btn-5:hover:after{
  width:100%;
  transition:800ms ease all;
}

</style>
@endsection
@section('content')
    <section class="category-section" style="margin-top:50px;">
      <div class="container" data-aos="fade-up">

        <div class="section-header d-flex justify-content-between align-items-center mb-5">
          <h2>{{$topicname->topic}}</h2>
        </div>

        <div class="row">
           
          @foreach($topicpost as $topicpostItem)
          <div class="col-md-6">
            <div class="d-lg-flex post-entry-2">
              <a href="{{route('post.detail',['id'=>$topicpostItem->id])}}" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                <img src="{{$topicpostItem->image}}" style="width: 600px;height: 300px;" alt="" class="img-fluid">
              </a>
              <div>
                <div class="post-meta"><span class="date">Date:</span> <span class="mx-1">&bullet;</span> <span>{{$topicpostItem->created_at}}</span></div>
                <h3><a href="{{route('post.detail',['id'=>$topicpostItem->id])}}">{{$topicpostItem->description}}</a></h3>
                <h6><a href="{{route('post.detail',['id'=>$topicpostItem->id])}}">Topic: {{$topicpostItem->topick->topic}}</a></h6>

                <p>{{$topicpostItem->content}}</p>
                <div class="d-flex align-items-center author">
                  <div class="photo"><img src="{{$topicpostItem->imagesuser->image_user}}" alt="" class="img-fluid"></div>
                  <div class="name">
                    <h3 class="m-0 p-0">{{$topicpostItem->name}}</h3>
                  </div>
                </div>
              </div>
            </div>
            </div>
            @endforeach
            <div class="col-lg-8">{{$topicpost->links()}}</div>


         
        </div>
        
      </div>
    </section><!-- End Culture Category Section -->
    <a href="#" style="background:#19070B" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


@endsection

@section('js')


@endsection