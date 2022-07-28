<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Traits\storageImageTrait;
use App\Components\Recusive;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Str;
use Illuminate\Support\arr;
use Log;




class LoginController extends Controller
{
    use storageImageTrait;
    public function login()
    {
      if (auth()->check()) {
          return redirect()->route('home');
      }
      return view('login.login');
    }
    public function postlogin(Request $request)
  {
      $remember = $request->has('remember_me')?true:false;
      if (auth()->attempt([
          'email' => $request->email,
          'password' => $request->password
      ], $remember)) {
          return redirect()->route('home');
      } 
      return redirect()->route('login');

  }
  public function logout()
  {
      auth()->logout();
      return redirect()->route('login');
  }
  public function register()
  {
  	return view('login.register');
  }
  public function postregister(Request $request)
  {
  	if ($request->password1===$request->password2) {
  	try {
            DB::beginTransaction();
            	$dataCreate=[
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password1),
                     ];

                $dataUploadFeatureImage=$this->storageTraitUpload($request,fieldName:'image_user',foderName:'post');
                if (!empty($dataUploadFeatureImage)) {
                  $dataCreate['image_name']=$dataUploadFeatureImage['file_name'];
                    $dataCreate['image_user']=$dataUploadFeatureImage['file_path'];
        
                }

                $user=User::create($dataCreate);            
            
            DB::commit();
            return redirect()->route('login');
             
        }  catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message'.$exception->getMessage().'Line:'.$exception->getLine());
        								} 
    
			      } else {
				return redirect()->route('register');
			     }
    }
}
