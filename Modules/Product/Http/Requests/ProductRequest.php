<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => 'required|unique:products,name',
            'price'       => 'required|numeric',
            'image'       => 'required',
            'keywords'    => 'required',
            'description' => 'required',
            'listCate'    => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'Please enter your product',
            'name.unique'        => 'Product name has exist',
            'price.required'       => 'Please enter your price',
            'price.numeric'       => 'Price is a numeric not srting',
            'image.required'       => 'Please enter your image',
            'keywords.required'    => 'Please enter your keywords',
            'description.required' => 'Please enter your description',
            'listCate.required'    => 'Please choose your category',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
