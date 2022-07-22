
<html>
    <head>
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('/ZenBlog/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/ZenBlog/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500&family=Inter:wght@400;500&family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('/ZenBlog/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('/ZenBlog/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('/ZenBlog/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('/ZenBlog/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('/ZenBlog/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  @yield('css')

  <!-- Template Main CSS Files -->
  <link href="{{asset('')}}/ZenBlog/assets/css/variables.css" rel="stylesheet">
    </head>
    <body>
      @include('components.header');
        
     @yield('content')
     <!-- Vendor JS Files -->
  <script src="{{asset('/ZenBlog/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('/ZenBlog/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('/ZenBlog/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('/ZenBlog/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('/ZenBlog/assets/vendor/php-email-form/validate.js')}}"></script>
  @include('components.footer')
@yield('js')
  <!-- Template Main JS File -->
  <script src="{{asset('/ZenBlog/assets/js/main.js')}}"></script>
    </body>
</html>