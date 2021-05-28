<?php

namespace Modules\Menu\Entities;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
   protected $guarded  = ['user_id', 'name', 'wrapper_class'];
   public $timestamps = false;
}
