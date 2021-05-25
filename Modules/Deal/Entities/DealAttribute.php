<?php

namespace Modules\Deal\Entities;

use Illuminate\Database\Eloquent\Model;

class DealAttribute extends Model
{
    protected $fillable = ['label', 'value', 'deal_id'];
    public $timestamps = false;
}
