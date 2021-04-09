<?php

namespace Modules\Product\Repositories;

use Modules\Category\Entities\Category;
use Modules\Product\Entities\Product;

class ProductRepository
{
    private $product;
    private $category;
    public function __construct(Product $product, Category $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function getCate()
    {
        return $this->category->all();
    }

    public function all()
    {
        return $this->product->all();
    }

    public function create(array $value)
    {
        return $this->product->insert($value);
    }

    public function find($id)
    {
        return $this->product->find($id);
    }

    public function update(array $value, $id)
    {
        return $this->product->where('id', $id)->update($value);
    }

    public function delete($id)
    {
        return $this->product->find($id)->delete();
    }
}
