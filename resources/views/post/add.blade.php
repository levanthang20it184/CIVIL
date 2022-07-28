<!-- resources/views/child.blade.php -->

@extends('layout.master')

@section('title')
<title>ADD </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<link rel="stylesheet" href="{{asset('user/index.css')}}">

@endsection
@section('content')
    
<div class="content-wrapper" style="padding: 200px;">
   
    <div class="col-md-12">
 
    </div>
    <form action="{{route('post.store')}}"method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
            
              @csrf
                    <div class="form-group">
                        <label>User Name:{{auth()->check()?auth()->user()->name:""}} </label>
                        
                    </div>
                    <div class="form-group">
                        <label >Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" value="{{old('description')}}" placeholder=" Input Description    " name="description">
                        @error('description')
                            <div class="alert alert-danger error1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label >Image Post</label>
                        <input type="file" class="form-control-file" placeholder=" Nhập tên sản phẩm    " name="image">
                    </div>
                    <div class="form-group">
                        <label>Choose Topic</label>
                        <select class="form-control" name="topic">
                        <option value="">--Topic--</option>
                            @foreach($topic as $key => $topicItem)
                        <option value="{{$topicItem->id}}">{{$topicItem->topic}}</option>
                            @endforeach
                        </select>
                    </div>
                    
            </div>

            <div class="col-md-10">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control my-editor @error('content') is-invalid @enderror"  rows="8" id="readonly-demo">{{old('content')}}</textarea>
                        @error('content')
                            <div class="alert alert-danger error1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="custom-btn btn-4">Submit</button>
            </div>
        </div>
      </div>
    </div>
  </div>
  </form>
@endsection

@section('js')


@endsection