<?php

namespace Modules\Page\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    protected $fillable  = ['title', 'description', 'status', 'user_id', 'template'];

    public function attributes(): HasMany
    {
        return $this->hasMany(PageAttribute::class);
    }
}
