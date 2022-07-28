
@extends('layout.master')

@section('title')
<title>User Imformation</title>
@endsection
@section('css')
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('user/delete.js')}}"></script>

@endsection
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<link rel="stylesheet" href="{{asset('user/index.css')}}">

@endsection
@section('content')
    <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
        @if($user==null)
        <div class="col-lg-6 text-center mb-5" style="margin-left:300px;">

          <svg xmlns="http://www.w3.org/2000/svg" id="robot-error" viewBox="0 0 260 118.9">
            <defs>
                <clipPath id="white-clip"><circle id="white-eye" fill="#cacaca" cx="130" cy="65" r="20" /> </clipPath>
             <text id="text-s" class="error-text" y="106"> 403 </text>
            </defs>
              <path class="alarm" fill="#e62326" d="M120.9 19.6V9.1c0-5 4.1-9.1 9.1-9.1h0c5 0 9.1 4.1 9.1 9.1v10.6" />
             <use xlink:href="#text-s" x="-0.5px" y="-1px" fill="black"></use>
             <use xlink:href="#text-s" fill="#2b2b2b"></use>
            <g id="robot">
              <g id="eye-wrap">
                <use xlink:href="#white-eye"></use>
                <circle id="eyef" class="eye" clip-path="url(#white-clip)" fill="#000" stroke="#2aa7cc" stroke-width="2" stroke-miterlimit="10" cx="130" cy="65" r="11" />
            <ellipse id="white-eye" fill="#2b2b2b" cx="130" cy="40" rx="18" ry="12" />
              </g>
              <circle class="lightblue" cx="105" cy="32" r="2.5" id="tornillo" />
              <use xlink:href="#tornillo" x="50"></use>
              <use xlink:href="#tornillo" x="50" y="60"></use>
              <use xlink:href="#tornillo" y="60"></use>
            </g>
          </svg>
            <h1>You are not allowed to enter here</h1>
            <h2>Go <a style="color: #2aa7cc;text-decoration: none;" href="{{route('login')}}">Login</a></h2>

          
         </div>


          @else
            <div class="col-lg-12 text-center mb-5">
                  <h1 class="page-title">{{$user->name}}</h1>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-12 text-center mb-5">
                  <div class="info-item">
                    <img src="{{$user->image_user}}" alt="">
                    <h3>Email: {{$user->email}}</h3>
                    <address>Date: {{$user->created_at}}</address>
                  </div>
                </div><!-- End Info Item -->  
                  
                <div class="text-center"><a style="background: yellow;height: 200px;width: 100px;" href="{{route('user.edit',['id'=>$user->id])}}"><button class="custom-btn btn-4"><span>Edit User</span></button></a> </div>

                @endif
                </div>
              <div class="row" style="margin-top:100px">
              @if($post_user==null)
                  <div class="col-lg-6 text-center mb-5" style="margin-left:300px;">

                    <svg xmlns="http://www.w3.org/2000/svg" id="robot-error" viewBox="0 0 260 118.9">
                      <defs>
                          <clipPath id="white-clip"><circle id="white-eye" fill="#cacaca" cx="130" cy="65" r="20" /> </clipPath>
                      <text id="text-s" class="error-text" y="106"> 403 </text>
                      </defs>
                        <path class="alarm" fill="#e62326" d="M120.9 19.6V9.1c0-5 4.1-9.1 9.1-9.1h0c5 0 9.1 4.1 9.1 9.1v10.6" />
                      <use xlink:href="#text-s" x="-0.5px" y="-1px" fill="black"></use>
                      <use xlink:href="#text-s" fill="#2b2b2b"></use>
                      <g id="robot">
                        <g id="eye-wrap">
                          <use xlink:href="#white-eye"></use>
                          <circle id="eyef" class="eye" clip-path="url(#white-clip)" fill="#000" stroke="#2aa7cc" stroke-width="2" stroke-miterlimit="10" cx="130" cy="65" r="11" />
                      <ellipse id="white-eye" fill="#2b2b2b" cx="130" cy="40" rx="18" ry="12" />
                        </g>
                        <circle class="lightblue" cx="105" cy="32" r="2.5" id="tornillo" />
                        <use xlink:href="#tornillo" x="50"></use>
                        <use xlink:href="#tornillo" x="50" y="60"></use>
                        <use xlink:href="#tornillo" y="60"></use>
                      </g>
                    </svg>
                      <h1>You are not allowed to enter here</h1>
                      <h2>Go <a style="color: #2aa7cc;text-decoration: none;" href="{{route('login')}}">Login</a></h2>

                    
                  </div>


          @else
                @foreach($post_user as $post_userItem)
                    <div class="col-md-6" style="border-color:#E9967A;border-width:3px;border-style: solid;padding: 50px;">
                      <div class="d-lg-flex post-entry-2">
                        <a href="single-post.html" class="me-4 thumbnail mb-4 mb-lg-0 d-inline-block">
                          <img src="{{$post_userItem->image}}" style="width: 300px;height: 200px;" alt="" class="img-fluid">
                        </a>
                        <div>
                          <div class="post-meta"><span class="date">Date:</span> <span class="mx-1">&bullet;</span> <span>{{$post_userItem->created_at}}</span></div>
                          <h3><a href="single-post.html">{{$post_userItem->description}}</a></h3>
                          <p>{{$post_userItem->content}}</p>
                          <div class="d-flex align-items-center author">
                            
                          </div>
                        </div>
                      </div>
                      <div class="frame">
                        <a href="{{route('user.editpost',['id'=>$post_userItem->id])}}"><button class="custom-btn btn-4"><span>Edit Post</span></button></a>
                        <a href="" class="actionDelete" data-url="{{route('post.delete',['id'=>$post_userItem->id])}}"><button class="custom-btn btn-5 "><span>Delete</span></button></a>
                       
                      </div>
                    </div>
           @endforeach
           </div>
           <div class="col-md-9" style="height: 100px;margin-left:500px;margin-top:40px">{{ $post_user->links()}}</div>
           @endif
          
        </div>
       

      </div>
    </section>

  </main><!-- End #main -->
@endsection

