 <!-- ======= Header ======= -->
 <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="#" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="/ZenBlog/assets/img/logo.png" alt=""> -->
        
      </a>
      <a href="{{route('home')}}"><img  src="{{asset('/ZenBlog/assets/img/logo.jpg')}}" alt="" style="width: 200px;height: 200px;">
</a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('home')}}">Home</a></li>
          <li><a href="{{route('post.index')}}">Single Post</a></li>
          <li class="dropdown"><a href="category.html"><span>Topic</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              @foreach($topic as $topicItem)
              <li><a href="{{route('topic',['id'=>$topicItem->id])}}">{{$topicItem->topic}}</a></li>
              @endforeach
            </ul>
          </li>

          <li><a href="{{route('about')}}">About</a></li>
          <li><a href="{{route('contact')}}">Contact</a></li>
        </ul>
      </nav><!-- .navbar -->

      <div class="position-relative">
        <a href="#" class="mx-2"><span class="bi-facebook"></span></a>
        <a href="#" class="mx-2"><span class="bi-twitter"></span></a>
        <a href="#" class="mx-2"><span class="bi-instagram"></span></a>
        					
        <a href="#" class="mx-2 js-search-open"><span class="bi-search"></span></a>
        <i class="bi bi-list mobile-nav-toggle"></i>

        <!-- ======= Search Form ======= -->
        <div class="search-form-wrap js-search-form-wrap">

        
          <form action="{{route('search')}}" method="post" class="search-form">
          @csrf
            <span class="icon bi-search"></span>
            <input type="text"name="keywords_submit" placeholder="Search" class="form-control">
            <button class="" style="margin-left:240px;margin-top:10px;background:#9ACD32" type="submit">Search</span></button>

            <button class="btn js-search-close"><span class="bi-x"></span></button>
          </form>
        </div><!-- End Search Form -->
       

    </div>
    
    <nav id="navbar" class="navbar">
        <ul>
            <li class="dropdown"><a href="#"><span>{{auth()->check()?auth()->user()->name:""}}</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                <li><a href="{{route('user.index')}}">User Information</a></li>
                <li><a href="{{route('slider.index')}}">Slider</a></li>
                <li><a href="{{route('logout')}}">Logout</a></li>
            </li>
        </ul>
            
        	
        </nav>
  </header><!-- End Header -->