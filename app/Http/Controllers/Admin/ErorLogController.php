<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ErrorLog;
use Illuminate\Http\Request;

class ErorLogController extends Controller
{
    public function index(Request $request)
    {
        $query = ErrorLog::query();

        // Filter judul
        if ($request->filled('message')) {
            $query->where('message', 'like', '%' . $request->message . '%');
        }

        // Filter tanggal
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }
        // Pagination
        $perPage = $request->get('per_page', 10);
        $errorLogs = $query->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->all());
        return view('admin.error_log.index', compact('errorLogs'));
    }

    public function show($id)
    {
        $log = ErrorLog::find($id);
        return view('admin.error_log.show', compact('log'));
    }
    public function deleteLast30()
    {
        ErrorLog::orderBy('created_at', 'asc')->limit(30)->delete();
        return back()->with('success', '30 error log paling lama berhasil dihapus');
    }
}
