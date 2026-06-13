<?php

namespace App\Traits;

use Spatie\Activitylog\Models\Activity;

trait HasActivityRequestInfo
{
    public function tapActivity(Activity $activity, string $eventName): void
    {
        $properties = collect($activity->properties ?? []);

        $requestInfo = app()->runningInConsole()
            ? ['source' => 'console/seeder']
            : [
                'ip_address'  => request()->ip(),
                'url'         => request()->fullUrl(),
                'method'      => request()->method(),
                'user_agent'  => request()->userAgent(),
            ];

        $activity->properties = $properties->put('request', $requestInfo);
    }
}