<?php

namespace Modules\User\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'       => 'required',
            'email'      => 'required|unique:users,email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password'   => 'required',
            'repassword' => 'required|same:password',
            'level'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Please Enter Your Name',
            'password.required' => 'Please Enter Your Password',
            'repassword.same'   => 'RePassword not the same Password',
            'email.required'    => 'Please Enter Your Email',
            'email.unique'      => 'Email has exist',
            'email.regex'       => 'Email Error Syntax',
            'level.required'    => 'Please choose level',
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
