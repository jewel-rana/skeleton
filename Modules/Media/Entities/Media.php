<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Brand\Entities\Brand;

class Media extends Model
{
    protected $table = 'medias';
    protected $fillable = ['attachment', 'type', 'extension', 'dimension', 'user_id'];

    public function brands(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }

    public function sliders(): BelongsToMany
    {
        return $this->belongsToMany(Brand::class);
    }
}
