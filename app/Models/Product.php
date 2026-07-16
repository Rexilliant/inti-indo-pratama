<?php

namespace App\Models;

use App\Traits\HasActivityRequestInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

use Spatie\Activitylog\Support\LogOptions;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Activitylog\Models\Concerns\LogsActivity;

class Product extends Model implements HasMedia
{
    // LogsActivity dicabut dari sini
    use HasFactory, SoftDeletes, LogsActivity, HasActivityRequestInfo, InteractsWithMedia;

    protected $fillable = ['code', 'name', 'slug', 'description'];

    // Semua fungsi & property Activity Log dihapus total

    // Otomatis membuat slug dari nama barang saat menciptakan data
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty();
    }

    // Otomatis membuat thumbnail gambar (Sama persis dengan spek awal)
    public function registerMediaConversions(?Media $media = null): void
    {
        $this->addMediaConversion('thumb')->width(300)->height(300)->keepOriginalImageFormat();

        $this->addMediaConversion('preview')->width(800)->height(800)->keepOriginalImageFormat();
    }
}
