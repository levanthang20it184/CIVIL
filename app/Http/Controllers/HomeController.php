<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Post;
use App\Models\User;
use App\Models\Topic;

class HomeController extends Controller
{
    
    public function index()
    {
        $topic=Topic::get();
        $user=User::latest()->simplePaginate(4);
        $slider=Slider::latest()->get();
        $post=Post::latest()->simplePaginate(6);
        $postnew=Post::latest()->first();

        return view('home.home',compact('slider','post','user','topic','postnew'));
    }
    public function topic($id)
    {
        $topic=Topic::get();
        $topicname=Topic::find($id);
        $topicpost=Post::where('topic_id',$id)->simplePaginate(2);
        return view('topic.index',compact('topicpost','topic','topicname'));
    }
    public function search(Request $request)
    {
        $keywords=$request->keywords_submit;
        $topic=Topic::get();
         $search_post=Post::where('description','like','%'.$keywords.'%')->simplePaginate(2);

         return view('search.search',compact('topic','search_post'));
    }
    public function contact()
    {
        $topic=Topic::get();

        return view('home.contact',compact('topic'));
    }
}
