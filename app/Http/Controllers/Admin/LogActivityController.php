<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Spatie\Activitylog\Models\Activity;

class LogActivityController extends Controller
{
    public function index()
    {
        $logs = Activity::with('causer', 'subject')
            ->latest()
            ->paginate(10);

        return view('admin.log-activity.index', compact('logs'));
    }

    public function show(Activity $activity)
    {
        return view('admin.log-activity.view', compact('activity'));
    }
}
