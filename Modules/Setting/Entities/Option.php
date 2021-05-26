<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = ['field', 'value', 'tab'];
    public $timestamps = false;
}
