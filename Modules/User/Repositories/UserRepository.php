<?php

namespace Modules\User\Repositories;

use Modules\Category\Repositories\Eloquent\BaseRepository;
use Modules\User\Entities\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return User::class;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create($attributes = [])
    {
        return $this->model->insert($attributes);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update($attributes = [], $id)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }
}
