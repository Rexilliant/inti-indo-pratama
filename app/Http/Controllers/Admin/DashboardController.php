<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Feedback;
use App\Models\News;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // ----- Filter tanggal -----
        $startDate = $request->filled('start_date') ? Carbon::parse($request->start_date)->startOfDay() : now()->subDays(29)->startOfDay();

        $endDate = $request->filled('end_date') ? Carbon::parse($request->end_date)->endOfDay() : now()->endOfDay();

        // ----- Hitung persentase perubahan User dibanding periode sebelumnya -----
        $days = $startDate->diffInDays($endDate) ?: 1;
        $previousStart = (clone $startDate)->subDays($days);
        $previousEnd = (clone $startDate)->subSecond();

        $usersCurrentPeriod = User::whereBetween('created_at', [$startDate, $endDate])->count();
        $usersPreviousPeriod = User::whereBetween('created_at', [$previousStart, $previousEnd])->count();

        if ($usersPreviousPeriod === 0) {
            $usersChange = $usersCurrentPeriod > 0 ? 100 : 0;
        } else {
            $usersChange = round((($usersCurrentPeriod - $usersPreviousPeriod) / $usersPreviousPeriod) * 100);
        }

        $usersTrend = $usersChange > 0 ? 'up' : ($usersChange < 0 ? 'down' : 'neutral');
        $usersDelta = ($usersChange >= 0 ? '+' : '') . $usersChange . '% dari periode sebelumnya';

        // ----- Stat cards -----
        $stats = [
            [
                'label' => 'Users',
                'value' => User::count(),
                'delta' => $usersDelta,
                'trend' => $usersTrend,
                'icon' => 'users',
                'color' => 'blue',
            ],
            [
                'label' => 'Products',
                'value' => Product::count(),
                'delta' => '+' . Product::whereBetween('created_at', [$startDate, $endDate])->count() . ' Produk',
                'trend' => 'up',
                'icon' => 'box',
                'color' => 'emerald',
            ],
            [
                'label' => 'News',
                'value' => News::count(),
                'delta' => '+' . News::whereBetween('created_at', [$startDate, $endDate])->count() . ' Artikel',
                'trend' => 'up',
                'icon' => 'newspaper',
                'color' => 'amber',
            ],
            [
                'label' => 'Testimonials',
                'value' => Testimonial::count(),
                'delta' => '+' . Testimonial::whereBetween('created_at', [$startDate, $endDate])->count() . ' Testimonial',
                'trend' => 'up',
                'icon' => 'star',
                'color' => 'pink',
            ],
            [
                'label' => 'Feedback',
                'value' => Feedback::count(),
                'delta' => Feedback::whereBetween('created_at', [$startDate, $endDate])->count() . ' Belum Dibalas',
                'trend' => 'up',
                'icon' => 'chat',
                'color' => 'rose',
            ],
            [
                'label' => 'FAQ',
                'value' => Faq::count(),
                'delta' => 'Total FAQ',
                'trend' => 'neutral',
                'icon' => 'question',
                'color' => 'violet',
            ],
        ];

        // ----- Ringkasan (progress bar) -----
        // Denominator dipakai untuk hitung lebar bar (%). Sesuaikan bila perlu.
        $summaryRaw = [
            'User' => ['value' => $stats[0]['value'], 'max' => 320, 'color' => 'bg-blue-500'],
            'Produk' => ['value' => $stats[1]['value'], 'max' => 130, 'color' => 'bg-emerald-500'],
            'News' => ['value' => $stats[2]['value'], 'max' => 80, 'color' => 'bg-amber-500'],
            'Feedback' => ['value' => $stats[4]['value'], 'max' => 90, 'color' => 'bg-rose-500'],
        ];

        $summary = [];

        foreach ($summaryRaw as $label => $row) {
            $percent = $row['max'] > 0 ? min(100, round(($row['value'] / $row['max']) * 100)) : 0;

            $summary[] = [
                'label' => $label,
                'value' => $row['value'],
                'width' => $percent . '%',
                'color' => $row['color'],
            ];
        }

        // ----- Recent activity (Spatie Activitylog) -----
        // Pastikan package spatie/laravel-activitylog sudah terpasang & tabel
        // "activity_log" sudah dimigrasikan. Model-model yang ingin dicatat
        // (User, Product, dll) perlu pakai trait Spatie\Activitylog\Traits\LogsActivity.
        $eventLabel = [
            'created' => 'Success',
            'updated' => 'Updated',
            'deleted' => 'Deleted',
        ];

        $recentActivities = [];

        foreach (Activity::with('causer')->whereBetween('created_at', [$startDate, $endDate])->latest()->take(6)->get() as $log) {
            $causerName = $log->causer->name ?? 'System';
            $modelName = $log->subject_type ? class_basename($log->subject_type) : 'data';
            $verb = $eventVerb[$log->event] ?? $log->description;

            $recentActivities[] = [
                'title' => "{$causerName} {$verb} {$modelName}",
                'time' => $log->created_at->diffForHumans(),
                'status' => $eventLabel[$log->event] ?? 'Info',
            ];
        }

        return view('admin.dashboard', compact('stats', 'summary', 'recentActivities', 'startDate', 'endDate'));
    }
}
