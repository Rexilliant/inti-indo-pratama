<?php

namespace App\Models;

use App\Models\NewsCategory;
use App\Traits\HasActivityRequestInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Models\Concerns\LogsActivity;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class News extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, LogsActivity, HasActivityRequestInfo, InteractsWithMedia;

    protected $fillable = ['title', 'slug', 'hook', 'description', 'published_at'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty();
    }
    public function news_categories()
    {
        return $this->belongsToMany(NewsCategory::class, 'news_category_relations', 'news_id', 'news_category_id');
    }
}
