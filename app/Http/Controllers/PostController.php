<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Components\Recusive;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Traits\storageImageTrait;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Comment;
use Illuminate\Support\arr;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostAddRequest;
use Log;


class PostController extends Controller
{
    use storageImageTrait;
    
     private $post;
    
    
    public function __construct(Post $post)
    {
        $this->post=$post;
    
    }

   public function index()
   {
    $topic=Topic::get();
    $post=$this->post->latest()->simplePaginate(4);
        return view('post.index',compact('post','topic'));
   }
   public function detail($id)
   {
    $topic=Topic::get();

    $comment=Comment::where('post_id',$id)->get();
    $total = Comment::where('post_id','=',$id)->count();
    $detailpost=$this->post->find($id);
    return view('post.detailpost',compact('detailpost','comment','total','topic'));
   }
    public function create()
    {
        $topic=Topic::get();
        return view('post.add',compact('topic'));
    }
    
    public function store(Request $request)
    { 
        //   dd($request->all());
        // $topic = (int)$request->topic;
        try {
            DB::beginTransaction();
            $dataProductCreate=[
                'name'=>auth()->check()?auth()->user()->name:"",
                'description'=>$request->description,
                'content'=>$request->content,
                'user_id'=>auth()->id(),
                'topic_id'=>$request->topic,
                       ];
            $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'image',foderName:'post');
            if (!empty($dataUploadFeatureImage)) {
              $dataProductCreate['feature_image_name']=$dataUploadFeatureImage['file_name'];
                $dataProductCreate['image']=$dataUploadFeatureImage['file_path'];
    
            }
            // dd($dataProductCreate);
            $post=$this->post->create($dataProductCreate);
           
        
            DB::commit();
            return redirect()->route('post.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        } 
    }

    public function edit($id)
        {
            $post=$this->post->find($id);
           
            return view('post.edit',compact('post'));
        }
    // public function update(Request $request,$id)
    // {
    //     try {
    //         DB::beginTransaction();
    //         $dataProductUpdate=[
    //             'name'=>$request->name,
    //             'price'=>$request->price,
    //             'content'=>$request->content,
    //             'user_id'=>auth()->id(),
    //             'category_id'=>$request->category_id
    
    //                    ];
    //         $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'feature_image',foderName:'product');
    //         if (!empty($dataUploadFeatureImage)) {
    //             $dataProductUpdate['feature_image_name']=$dataUploadFeatureImage['file_name'];
    //             $dataProductUpdate['feature_image']=$dataUploadFeatureImage['file_path'];
    
    //         }
    //         $this->product->find($id)->update($dataProductUpdate);
    //         $products=$this->product->find($id);
    //         // dd($products); 
            
    //         // Insert data của product image
    //         if ($request->hasFile('image_path')) {
    //             $this->productImage->where('product_id',$id)->delete();
    //             foreach ($request->image_path as $fileItem) {
    //                 $dataProductImageDetail=$this->storageTraitUploadMutiple( $fileItem,foderName:'product');
    //                 $products->images()->create([
                        
    //                     'image_path'=>$dataProductImageDetail['file_path'],
    //                     'image_name'=>$dataProductImageDetail['file_name']
    //                 ]);
                    
    //             }
    //         }
    
    //         //Insert tags for product
    //         $tagIds=[];
    //         if (!empty($request->tags)) {
    //             foreach ($request->tags as $tagItem) {
    //                 //Insert to tag
    //                 $tagInstance=$this->tag->firstOrCreate([
    //                     'name'=>$tagItem
    //                 ]);
    //                 $tagIds[]=$tagInstance->id;
    //             }
                
    //         } 
    //         $products->tags()->sync($tagIds);
    //         DB::commit();
    //         return redirect()->route('product.index');
    //     } catch (\Exception $exception) {
    //         DB::rollBack();
    //         Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
    //     } 
    // }
   
}
