<?php

namespace Modules\Product\Repositories;

use App\Models\Product;

class ProductRepository
{
    private $product;
    public function __construct(Product $product)
    {
        $this->product = $product;
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
