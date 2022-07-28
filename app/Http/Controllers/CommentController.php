<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Comment;
use Illuminate\Support\arr;
use Illuminate\Support\Facades\DB;
use Log;
class CommentController extends Controller
{
    public function store(Request $request,$id)
    {
        $int = (int)$id;
        try {
            DB::beginTransaction();
            $datacreate=[
                'comment'=>$request->comment,
                'user_id'=>auth()->id(),
                'post_id'=>$int,
                     ];
        
                
                //  dd($datacreate);
                $comment=Comment::create($datacreate); 
    
            DB::commit();
            return redirect()->route('post.detail',['id'=>$int]);
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 

    }
    public function deletecomment($id)
    {
        try {
           $comment=Comment::find($id)->delete();
           return response()->json([
            'code'=>200,
            'message'=>'fail'

        ],status:200);
        } catch (\Exception $exception) {
            
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
            return response()->json([
                'code'=>500,
                'message'=>'fail'

            ],status:500);
        } 
    }
}
