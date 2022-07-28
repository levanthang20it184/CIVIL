@extends('layout.master')

@section('title')
<title>ADD </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<link rel="stylesheet" href="{{asset('user/index.css')}}">

@endsection
@section('content')
    
<div class="content-wrapper" style="margin-top:200px;margin-left:300px">
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('slider.store')}}"method="post" enctype="multipart/form-data">
              @csrf
                    <div class="form-group">
                        <label >Name Slider</label>
                        <input type="text" class="form-control " value="{{old('name')}}" placeholder=" Input name slider    " name="name">
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <textarea class="form-control" name="description"  rows="4">
                        
                        </textarea>
                        
                    </div>
                    <div class="form-group">
                        <label >Image</label>
                        <input type="file" class="form-control-file" name="image_path">
                       
                    </div>
                    
                    <button type="submit" class="custom-btn btn-4">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection

