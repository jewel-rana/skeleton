<?php

namespace Modules\Product\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Product\Database\factories\ProductFactory;

class Product extends Model
{
    use SoftDeletes, HasFactory;

    protected $guarded = [];

    protected static function newFactory()
    {
        return ProductFactory::new();
    }
}
