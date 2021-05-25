<?php

namespace Modules\Deal\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Brand\Entities\Brand;
use Modules\Product\Entities\Product;

class Deal extends Model
{
    protected $fillable = ['brand_id', 'product_id', 'user_id', 'deal_type_id', 'name'];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function dealType(): BelongsTo
    {
        return $this->belongsTo(DealType::class);
    }
}
