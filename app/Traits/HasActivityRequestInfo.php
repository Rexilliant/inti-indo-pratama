<?php

namespace App\Traits;

use Spatie\Activitylog\Models\Activity;

trait HasActivityRequestInfo
{
    public function tapActivity(Activity $activity, string $eventName): void
    {
        $properties = $activity->properties ?? collect();

        if (app()->runningInConsole()) {
            $activity->properties = $properties->merge([
                'request' => [
                    'source' => 'console/seeder',
                ],
            ]);

            return;
        }

        $activity->properties = $properties->merge([
            'request' => [
                'ip_address' => request()->ip(),
                'url' => request()->fullUrl(),
                'method' => request()->method(),
                'user_agent' => request()->userAgent(),
            ],
        ]);
    }
}
