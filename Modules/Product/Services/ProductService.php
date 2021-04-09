<?php

namespace Modules\Product\Services;

use Illuminate\Http\Request;
use Modules\Product\Repositories\ProductRepositoryInterface;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getCate()
    {
        return $this->productRepository->getCate();
    }

    public function all()
    {
        return $this->productRepository->all();
    }

    public function create(Request $request)
    {
        $product = [
            "name"        => $request->name,
            "alias"       => changeTitle($request->name),
            'price'       => $request->price,
            'image'       => $request->image,
            'keywords'    => $request->keywords,
            'description' => $request->description,
            'user_id'     => 1,
            'cate_id'     => $request->listCate,
        ];

        return $this->productRepository->create($product);
    }


    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function update(Request $request, $id)
    {

        $product = [
            "name"        => $request->name,
            "alias"       => changeTitle($request->name),
            'price'       => $request->price,
            'image'       => $request->image,
            'keywords'    => $request->keywords,
            'description' => $request->description,
            'user_id'     => 1,
            'cate_id'     => $request->listCate,
        ];


        return $this->productRepository->update($product, $id);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }
}
