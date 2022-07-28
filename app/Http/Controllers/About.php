<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\User;

class About extends Controller
{
    public function index()
    {
        $topic=Topic::get();
        $user=User::latest()->simplePaginate(4);
        return view('about.index',compact('topic','user'));
    }
}
