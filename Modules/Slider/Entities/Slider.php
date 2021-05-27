<?php

namespace Modules\Slider\Entities;

use App\Models\ModelInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Media\Entities\Media;

class Slider extends Model implements ModelInterface
{
    protected $fillable = ['name', 'description', 'user_id'];

    public function medias(): BelongsToMany
    {
        return $this->belongsToMany(Media::class)->withPivot(['title', 'description', 'btn_text', 'btn_link', 'created_at', 'updated_at']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
