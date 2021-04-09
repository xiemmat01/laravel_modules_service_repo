<?php

namespace Modules\Category\Repositories;

interface CategoryRepositoryInterface
{

    public function all();


    public function create($attributes = []);


    public function find($id);


    public function update($attributes = [], $id);


    public function delete($id);
}
