<?php

namespace Modules\Deal\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Brand\Entities\Brand;
use Modules\Product\Entities\Product;

class Deal extends Model
{
    protected $fillable = ['brand_id', 'product_id', 'user_id', 'type', 'name'];

    public function brand()
    {
        $this->belongsTo(Brand::class);
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
