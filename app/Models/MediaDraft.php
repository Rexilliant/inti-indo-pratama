<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class MediaDraft extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'media_drafts';
}