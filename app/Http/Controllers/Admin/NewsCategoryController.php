<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $news_categories = NewsCategory::all();
        return view('admin.news-category.index', compact('news_categories'));
    }

    public function create()
    {
        return view('admin.news-category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:news_categories,name',
        ]);

        try {
            $slug = Str::slug($request->name);

            NewsCategory::create([
                'name' => $request->name,
                'slug' => $slug,
            ]);

            return redirect()->route('admin.news-category.index')->with('success', 'News Category created successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed create news category', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->back()->withInput()->with('error', 'Failed to create News Category.');
        }
    }

    public function edit(NewsCategory $news_category)
    {
        return view('admin.news-category.edit', compact('news_category'));
    }

    public function update(Request $request, NewsCategory $news_category)
    {
        $request->validate([
            'name' => 'required|unique:news_categories,name,' . $news_category->id,
        ]);

        try {
            $news_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
            ]);

            return redirect()->route('admin.news-category.index')->with('success', 'News Category updated successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed update news category', [
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->withInput()->with('error', 'Failed to update News Category.');
        }
    }

    public function destroy(NewsCategory $news_category)
    {
        try {
            $news_category->delete();

            return redirect()->route('admin.news-category.index')->with('success', 'News Category deleted successfully.');
        } catch (\Exception $e) {
            \Log::error('Failed delete news category', [
                'id' => $news_category->id,
                'message' => $e->getMessage(),
            ]);

            return redirect()->back()->with('error', 'Failed to delete News Category.');
        }
    }
}
