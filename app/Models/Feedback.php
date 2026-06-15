<?php

namespace App\Models;

use App\Traits\HasActivityRequestInfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Support\LogOptions;
use Spatie\Activitylog\Models\Concerns\LogsActivity;

class Feedback extends Model
{
    use HasFactory, SoftDeletes, LogsActivity, HasActivityRequestInfo;

    protected $fillable = ['name', 'email', 'subject', 'message'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll()->logOnlyDirty();
    }
}
