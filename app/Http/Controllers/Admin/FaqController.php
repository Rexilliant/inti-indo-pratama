<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $query = Faq::query();

        if ($request->has('question') && $request->question != '') {
            $query->where('question', 'like', '%' . $request->question . '%');
        }

        if ($request->has('date') && $request->date != '') {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $faqs = $query->latest()->paginate($request->get('per_page', 10));
        $statuses = FAQ::distinct()->pluck('status');
        return view('admin.faqs.index', compact('faqs', 'statuses'));
    }

    public function create()
    {
        $statuses = FAQ::getStatus();
        return view('admin.faqs.create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);
        Faq::create($request->only('question', 'answer', 'status'));
        return redirect()->route('admin.faqs.index')->with('success', 'Faq created successfully');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);
        $faq->update($request->only('question', 'answer', 'status'));
        return redirect()->route('admin.faqs.index')->with('success', 'Faq updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')->with('success', 'Faq deleted successfully');
    }
}
