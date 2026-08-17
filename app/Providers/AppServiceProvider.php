<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Jenssegers\Agent\Agent;
use Spatie\Activitylog\Models\Activity;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        \Illuminate\Support\Facades\View::composer('faqs.faqs', function ($view) {
            $view->with('faqs', \App\Models\Faq::where('status', 'published')->get());
        });

        \Illuminate\Support\Facades\View::composer('testimoni.index', function ($view) {
            $view->with('testimonials', \App\Models\Testimonial::where('status', 'published')->latest()->get());
        });

        Activity::saving(function (Activity $activity) {
            if (app()->runningInConsole()) {
                $requestInfo = [
                    'source' => 'console/seeder',
                ];
            } else {
                $agent = new Agent();

                $browser = $agent->browser();
                $platform = $agent->platform();

                $requestInfo = [
                    'user_id'          => Auth::id(),
                    'ip_address'      => request()->ip(),
                    'url'             => request()->fullUrl(),
                    'method'          => request()->method(),
                    'user_agent'      => request()->userAgent(),

                    'device'          => $agent->device(),
                    'browser'         => $browser,
                    'browser_version' => $browser ? $agent->version($browser) : null,
                    'platform'        => $platform,
                    'platform_version'=> $platform ? $agent->version($platform) : null,

                    'is_mobile'       => $agent->isMobile(),
                    'is_tablet'       => $agent->isTablet(),
                    'is_desktop'      => $agent->isDesktop(),
                    'is_robot'        => $agent->isRobot(),
                ];
            }

            $properties = $activity->properties?->toArray() ?? [];

            $properties['request'] = $requestInfo;

            $activity->properties = $properties;
        });
    }
}