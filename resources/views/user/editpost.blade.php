<!-- resources/views/child.blade.php -->

@extends('layout.master')

@section('title')
<title>Edit Post User </title>
@endsection
@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
<link rel="stylesheet" href="{{asset('user/index.css')}}">

@endsection
@section('content')
    
<div class="content-wrapper" style="padding: 200px;">
   
    <div class="col-md-12">
 
    </div>
    <form action="{{route('editpost.update',['id'=>$postuser->id])}}"method="post" enctype="multipart/form-data">
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
                        <input type="text" class="form-control " value="{{$postuser->description}}" placeholder=" Input Description    " name="description">
                        
                    </div>
                    <div class="form-group">
                        <label >Image Post</label>
                        <input type="file" class="form-control-file" placeholder=" Nhập tên sản phẩm    " name="image">
                        <div class="row">
                                <img style="width:200px; height: 100px;" src="{{$postuser->image}}" alt="">
                            </div>
                    </div>
                    <div class="form-group">
                        <label>Choose Topic</label>
                        <select class="form-control" name="topic">
                        <option value="{{$postuser->topic_id}}">{{$postuser->topick->topic}}</option>
                            @foreach($topic as $key => $topicItem)
                        <option value="{{$topicItem->id}}">{{$topicItem->topic}}</option>
                            @endforeach
                        </select>
                    </div>
                    
            </div>

            <div class="col-md-10">
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" class="form-control my-editor"  rows="8" id="readonly-demo">{{$postuser->content}}</textarea>
                        
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