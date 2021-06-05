<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;

class PageAttribute extends Model
{
    protected $fillable = ['page_id', 'label', 'content'];
    public $timestamps = false;
}
