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
        return $this->user->all();
    }

    public function create($attributes = [])
    {
        return $this->user->insert($attributes);
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function update($attributes = [], $id)
    {
        return $this->user->where('id', $id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->user->find($id)->delete();
    }
}
