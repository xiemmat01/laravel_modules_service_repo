<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
