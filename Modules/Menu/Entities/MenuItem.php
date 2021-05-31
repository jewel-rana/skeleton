<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MenuItem extends Model
{
    protected $fillable = ['menu_id', 'type', 'name', 'menu_url', 'css_class', 'icon_class', 'parent_id', 'menu_order'];
    public $timestamps = false;

    public function childs(): HasMany
    {
        return $this->hasMany(MenuItem::class, 'parent_id', 'id')->orderBy('menu_order', 'ASC');
    }
}
