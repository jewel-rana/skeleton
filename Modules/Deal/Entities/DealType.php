<?php

namespace Modules\Deal\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DealType extends Model
{
    protected $fillable = ['name', 'description'];

    public function deals(): HasMany
    {
        return $this->hasMany(Deal::class);
    }
}
