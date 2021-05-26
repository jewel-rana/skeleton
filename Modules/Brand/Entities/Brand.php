<?php

namespace Modules\Brand\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Media\Entities\Media;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'meta_keyword', 'meta_description', 'user_id'];

    public function medias(): BelongsToMany
    {
        return $this->belongsToMany(Media::class)->latest();
    }
}
