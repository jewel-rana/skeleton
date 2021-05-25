<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Entities\Category;
use Modules\Product\Database\factories\ProductFactory;

class Page extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable  = ['title', 'description', 'status', 'user_id', 'template'];

/*    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }*/
}
