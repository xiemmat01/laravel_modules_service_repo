<?php

namespace Modules\Category\Repositories\Eloquent;

interface RepositoryInterface
{
    public function all();

    public function create(array $attributes);

    public function find($id);

    public function update(array $attributes, $id);

    public function delete($id);
}
