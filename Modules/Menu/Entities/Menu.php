<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
   protected $fillable  = ['name', 'description', 'wrapper_class'];
   public $timestamps = false;

   public function items(): HasMany
   {
       return $this->hasMany(MenuItem::class, 'menu_id', 'id')->where('parent_id', '=', 0)->orderBy('menu_order', 'ASC');
   }
}
