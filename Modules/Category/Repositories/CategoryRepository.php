<?php

namespace Modules\Category\Repositories;

use App\Models\Category;

class CategoryRepository
{
    private $cate;
    public function __construct(Category $cate)
    {
        $this->cate = $cate;
    }

    public function all()
    {
        return $this->cate->all();
    }

    public function create(array $value)
    {
        return $this->cate->insert($value);
    }

    public function find($id)
    {
        return $this->cate->find($id);
    }

    public function update(array $value, $id)
    {
        return $this->cate->where('id', $id)->update($value);
    }

    public function delete($id)
    {
        return $this->cate->find($id)->delete();
    }
}
