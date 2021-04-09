<?php

namespace Modules\Product\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Modules\Product\Repositories\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return $this->productRepository->all();
    }

    public function create(Request $request)
    {
        $user = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => $request->level,
        ];

        return $this->productRepository->create($user);
    }


    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'       => 'required',
            'email'      => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password'   => 'required',
            'repassword' => 'required|same:password',
            'level'      => 'required',
        ], [
            'name.required'     => 'Please Enter Your Name',
            'password.required' => 'Please Enter Your Password',
            'repassword.same'   => 'RePassword not the same Password',
            'email.required'    => 'Please Enter Your Email',
            'email.regex'       => 'Email Error Syntax',
            'level.required'    => 'Please choose level',
        ]);
        $product = [
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "level" => $request->level,
        ];

        return $this->productRepository->update($product, $id);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
