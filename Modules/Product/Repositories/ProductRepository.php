<?php

namespace Modules\Product\Repositories;

use Modules\Category\Entities\Category;
use Modules\Category\Repositories\Eloquent\BaseRepository;
use Modules\Product\Entities\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{

    public function getModel()
    {
        return \Modules\Product\Entities\Product::class;
    }

    public function getCate()
    {
        return Category::all();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($value = [])
    {
        return $this->model->insert($value);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($value = [], $id)
    {
        return $this->model->where('id', $id)->update($value);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
