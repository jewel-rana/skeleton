<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Entities\Category;
use Modules\Product\Database\factories\ProductFactory;

class Menu extends Model
{
    use SoftDeletes, HasFactory;

   protected $guarded  = [];

 ///   protected $fillable  = ['name', 'user_id', 'logo', 'parent_id'];

}
