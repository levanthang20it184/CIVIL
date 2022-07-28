<!-- resources/views/child.blade.php -->

@extends('layout.master')

@section('title')
<title>Edit </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<link rel="stylesheet" href="{{asset('user/index.css')}}">

@endsection
@section('content')
    
<div class="content-wrapper"style="margin-top:200px;margin-left:300px;">
   
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            <form action="{{route('slider.update',['id'=>$slider->id])}}"method="post" enctype="multipart/form-data">
              @csrf
                    <div class="form-group">
                        <label >Tên Slider</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{$slider->name}}" placeholder=" Input name slider    " name="name">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Mô Tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"  rows="4">
                        {{$slider->description}}
                        </textarea>
                        @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Hình ảnh</label>
                        <input type="file" class="form-control-file @error('image_path') is-invalid @enderror" name="image_path">
                        <img style="with: 300px;height: 200px;" class="image1"  src="{{$slider->image_path}}" alt="">
                        @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="custom-btn btn-4">Submit</button>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>

@endsection

