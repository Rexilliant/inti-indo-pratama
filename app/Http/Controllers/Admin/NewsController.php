<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('admin.news.index');
    }

    public function create()
    {
        $news_categories = NewsCategory::all();

        return view('admin.news.create', compact('news_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'published_at' => 'required|date',
            'category_id' => 'required|exists:news_categories,id',
            'title' => 'required|string|max:255',
            'hook' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:3072',
        ]);

        DB::transaction(function () use ($request, $validated) {
            $news = News::create([
                'published_at' => $validated['published_at'],
                'title' => $validated['title'],
                'hook' => $validated['hook'],
                'content' => $validated['content'],
            ]);
            $news->news_categories()->attach($validated['category_id']);

            if ($request->hasFile('image')) {
                $news->addMediaFromRequest('image')->toMediaCollection('news');
            }
        });

        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    public function edit(News $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $news->update($request->all());

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
