<?php

namespace Modules\Brand\Entities;

use App\Models\ModelInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Media\Entities\Media;

class Brand extends Model implements ModelInterface
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'meta_keyword', 'meta_description', 'user_id'];

    public function medias(): BelongsToMany
    {
        return $this->belongsToMany(Media::class)->latest();
    }
}
