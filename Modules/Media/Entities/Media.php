<?php

namespace Modules\Media\Entities;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $table = 'medias';
    protected $fillable = ['attachment', 'type', 'extension', 'dimension', 'user_id'];
}
