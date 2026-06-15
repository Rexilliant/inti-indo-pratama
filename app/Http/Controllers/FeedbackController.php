<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    // Tampil di Admin
    public function index(Request $request)
    {
        $query = Feedback::latest();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('subject', 'like', "%{$search}%");
            });
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $perPage = $request->input('per_page', 5);
        $feedbacks = $query->paginate($perPage)->withQueryString();

        return view('admin.feedback.index', compact('feedbacks'));
    }

    // Simpan dari Guest
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Feedback::create($request->all());

        // Tambahin with() ini
        return back()->with('success', 'Terima kasih! Feedback Anda telah kami terima.');
    }

    // Hapus dari Admin
    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();
        return back()->with('success', 'Feedback berhasil dihapus!');
    }
}