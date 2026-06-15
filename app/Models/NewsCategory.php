<?php

namespace App\Models;

use App\Models\News;
use App\Traits\HasActivityRequestInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\Activitylog\Models\Concerns\LogsActivity;

class NewsCategory extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, HasActivityRequestInfo;

    protected $fillable = ['name', 'slug'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty();
    }
    public function news()
    {
        return $this->belongsToMany(News::class, 'news_category_relations', 'news_category_id', 'news_id');
    }
}
