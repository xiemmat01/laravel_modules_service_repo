<?php

namespace Modules\Category\Repositories;

use Modules\Category\Repositories\Eloquent\BaseRepository;
use Modules\Category\Repositories\CategoryRepositoryInterface;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function getModel()
    {
        return \Modules\Category\Entities\Category::class;
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
