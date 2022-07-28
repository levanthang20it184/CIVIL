<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Components\Recusive;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\storageImageTrait;
use Illuminate\Support\arr;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use App\Models\Topic;

use Illuminate\Support\Facades\DB;
use Log;

class UserController extends Controller
{
    use storageImageTrait;

    public function index()
    { 
        $topic=Topic::get();
        $user=User::find(auth()->id());
        $post_user=Post::where('user_id',auth()->id())->Paginate(2);
        return view('user.index',compact('user','post_user','topic'));
    }
    public function edit($id)
        {
            $topic=Topic::get();
            $user=User::find($id);
           
            return view('user.edit',compact('user','topic'));
        }
     public function update(Request $request,$id)
    {
        //dd($request->all());
        try {
            DB::beginTransaction();
            $dataUpdate=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                     ];

                $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'image_user',foderName:'post');
                if (!empty($dataUploadFeatureImage)) {
                  $dataUpdate['image_name']=$dataUploadFeatureImage['file_name'];
                    $dataUpdate['image_user']=$dataUploadFeatureImage['file_path'];
        
                }
                // dd($dataUpdate);
                $user=User::find($id)->update($dataUpdate); 
    
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function editpost($id)
    {
        $topic=Topic::get();
        $postuser=Post::find($id);
           
            return view('user.editpost',compact('postuser','topic'));


    }
    public function postupdate(Request $request,$id)
    {
        try {
            DB::beginTransaction();
            $datapostupdate=[
                'name'=>auth()->check()?auth()->user()->name:"",
                'description'=>$request->description,
                'content'=>$request->content,
                'user_id'=>auth()->id(),
                'topic_id'=>$request->topic,
                       ];
            $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'image',foderName:'post');
            if (!empty($dataUploadFeatureImage)) {
              $datapostupdate['feature_image_name']=$dataUploadFeatureImage['file_name'];
                $datapostupdate['image']=$dataUploadFeatureImage['file_path'];
    
            }
            $post=Post::find($id)->update($datapostupdate);
                       
        
            DB::commit();
            return redirect()->route('user.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }
    public function delete($id)
    {
        try {
            Post::find($id)->delete();
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
