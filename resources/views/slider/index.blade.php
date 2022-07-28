<!-- resources/views/child.blade.php -->

@extends('layout.master')

@section('title')
<title>Slider </title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
<script src="{{asset('vendors/sweetAlert2/sweetalert2@11.js')}}"></script>
<script src="{{asset('user/delete.js')}}"></script>
<link rel="stylesheet" href="{{asset('user/index.css')}}">

@endsection
@section('content')
    

<div class="content-wrapper">
     


    <div class="content">
      <div class="container-fluid" style="padding: 200px;">
        <div class="row">
          <div class="col-md-12">
                  <a href="{{route('slider.create')}}" class="btn btn-success float-right m-2">ADD</a>
          </div>
          <div class="col-md-12">
                     <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col"width="20%">Name Slider</th>
                            <th scope="col" width="30%">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                            
                          </tr>
                        </thead>  
                        <tbody>
                          @foreach($slider as $sliderItem)
                          <tr>
                            <th scope="row">{{$sliderItem->id}}</th>
                            <td>{{$sliderItem->name}}</td>
                            <td>{{$sliderItem->description}}</td>
                            <td><img style="with: 300px;height: 200px;" class="image" src="{{$sliderItem->image_path}}" alt="">
                            </td>
                            <td>
                               <a href="{{route('slider.edit',['id'=>$sliderItem->id])}}"class=""><button class="custom-btn btn-4"><span>Edit Slider</span></button></a>
                               <a href=""data-url="{{route('slider.delete',['id'=>$sliderItem->id])}}"class=" actionDelete"><button class="custom-btn btn-5"><span>Delete</span></button></a>
                            </td>
                          </tr>
                          @endforeach
                         
                        </tbody>
                        
                   </table>
          </div>
           <div>
           
           </div>      
        </div>
        
      </div>
    </div>

  </div>

@endsection

