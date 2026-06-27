<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ErrorLog extends Model
{
    protected $fillable = ['message', 'exception', 'file', 'line', 'url', 'method', 'input', 'user_id', 'ip'];

    protected $casts = [
        'input' => 'array',
    ];
}
