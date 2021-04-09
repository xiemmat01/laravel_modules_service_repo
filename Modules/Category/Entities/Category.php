<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $filltable = [
        'name',
        'alias',
        'order',
        'parent_id',
        'keywords',
        'description',
    ];

    public $timestamps = true;

    public function manyProduct()
    {
        return $this->hasMany('App\Models\Product');
    }

    protected static function newFactory()
    {
        return \Modules\Category\Database\factories\CategoryFactory::new();
    }
}
