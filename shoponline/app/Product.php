<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $fillable =
    [
        'category_id',
        'name',
        'price',
        'desc',
        'img'
    ];
    // protected $guarded = [];
    protected $dates = ['deleted_at'];
    use SoftDeletes;
}
