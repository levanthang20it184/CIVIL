
@extends('layout.master')

@section('title')
<title>Edit User </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('content')
    <main id="main">
    <section id="contact" class="contact mb-5">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Edit User</h1>
          </div>
        </div>

        <div class="row">

 <form action="{{route('user.update',['id'=>$user->id])}}" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div style="margin-left:400px" class="col-md-6">
            
              @csrf
                    
                    <div class="form-group">
                        <label >Name</label>
                        <input type="text" class="form-control"  placeholder=" Input Name    " value="{{$user->name}}" name="name">
                        
                    </div>
                    <div class="form-group">
                        <label >Email</label>
                        <input type="text" class="form-control"  placeholder=" Input Email    " value="{{$user->email}}" name="email">
                        
                    </div>
                    <div class="form-group">
                        <label >Password</label>
                        <input type="text" class="form-control"  placeholder=" Input Password    "  name="password">
                        
                    </div>
                    <div class="form-group">
                        <label >Image User</label>
                        <input type="file" class="form-control-file" placeholder="" name="image_user">
                        <div class="col-md-12">
                            <div class="row">
                                <img style="width:100px; height: 100px;" src="{{$user->image_user}}" alt="">
                            </div>
                        </div>
                    </div>
                    
            </div>

            <div class="col-md-10">
                    
                    <button type="submit" style=" margin-top: 20px;margin-left:700px;background:#00FF00;" class="btn btn-primary">Save</button>
            </div>
        </div>
      </div>
    </div>
  </div>
</form>


      </div>
    </section>

  </main><!-- End #main -->
@endsection

@section('js')


@endsection