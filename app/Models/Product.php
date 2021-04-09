<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
}
