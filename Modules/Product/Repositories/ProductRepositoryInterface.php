<?php

namespace Modules\Product\Repositories;

interface ProductRepositoryInterface
{

    public function all();

    public function getCate();

    public function create($attributes = []);

    public function find($id);


    public function update($attributes = [], $id);


    public function delete($id);
}
