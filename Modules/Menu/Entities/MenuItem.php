<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = ['menu_id', 'type', 'name', 'menu_url', 'css_class', 'icon_class', 'parent_id', 'menu_order'];
}
