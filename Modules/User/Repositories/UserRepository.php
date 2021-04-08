<?php

namespace App\Modules\User\Repositories;

use App\Models\User;

class UserRepository
{
    private $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function all()
    {
        return $this->user->all();
    }

    public function create(array $value)
    {
        return $this->user->insert($value);
    }

    public function find($id)
    {
        return $this->user->find($id);
    }

    public function update(array $value,$id)
    {
        return $this->user->where('id',$id)->update($value);
    }

    public function delete($id)
    {
        return $this->user->delete($id);
    }
}
