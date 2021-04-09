<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $filltable = [
        'name',
        'alias',
        'price',
        'image',
        'keywords',
        'description',
        'user_id',
        'cate_id',
    ];

    public $timestamp = true;

    public function cate()
    {
        return $this->belongTo('App\Models\Category');
    }

    public function user()
    {
        return $this->belongTo('App\Models\User');
    }

    protected static function newFactory()
    {
        return \Modules\Product\Database\factories\ProductFactory::new();
    }
}
