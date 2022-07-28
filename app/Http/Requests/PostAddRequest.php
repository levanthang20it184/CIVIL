<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=>'bail|required|unique:post|max:255|min:10',
            'description'=>'required',
            'content'=>'required',
        ];
    }
    public function messages()
{
    return [
            'name.unique' => 'Tên không được phép trùng !',
            'name.max' => 'Tên không được phép quá 255 kí tự !',
            'name.min' => 'Tên không được phép dưới 10 kí tự !',
            'name.required' => 'Tên không được phép trống !',
            'description.required' => 'Description không được phép trống !',
            'content.required'=>'Nội dung không được phép trống !',
       
    ];
}
}
