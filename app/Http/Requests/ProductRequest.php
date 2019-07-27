<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'category_id' => 'required',
            'cate_parent' => 'required',
            'name'        => 'required|unique:products,name',
            'status'      => 'required',
            'price'       => 'required',
            'image'       => 'required|image'
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => 'Please Choose Category Name !',
            'cate_parent.required' => 'Please Choose Category Parent !',
            'name.required'        => 'Please Enter Product Name !',
            'name.unique'          => 'This name is exits ! Please Enter Another Product Name !',
            'status.required'      => 'Please Enter Product Status !',
            'price.required'       => 'Please Enter Price !',
            'image.required'       => 'Please Choose Product Image !',
            'image.image'          => 'This File Is Not Image ! Please Choose Again.'
        ];
    }
}
