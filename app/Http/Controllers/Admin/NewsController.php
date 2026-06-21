<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MediaDraft;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::paginate(10);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $news_categories = NewsCategory::all();

        return view('admin.news.create', compact('news_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'hook' => 'required|string|max:500',
            'published_at' => 'required|date',
            'category_id' => 'required|exists:news_categories,id',
            'draft_id' => 'nullable|integer',
            'image' => 'required|image|max:2048',
        ]);

        return DB::transaction(function () use ($request, $validated) {
            // SLUG
            $slug = Str::slug($validated['title']);
            $base = $slug;
            $i = 1;

            while (News::where('slug', $slug)->exists()) {
                $slug = $base . '-' . $i++;
            }

            // CREATE NEWS
            $news = News::create([
                'title' => $validated['title'],
                'slug' => $slug,
                'content' => $validated['content'],
                'hook' => $validated['hook'],
                'published_at' => $validated['published_at'],
            ]);

            // MANY TO MANY
            $news->news_categories()->attach($validated['category_id']);

            // THUMBNAIL
            $news
                ->addMedia($request->file('image'))
                ->usingFileName(time() . '.' . $request->file('image')->getClientOriginalExtension())
                ->toMediaCollection('news-thumbnail');
            return redirect()->route('admin.news.index')->with('success', 'News berhasil dibuat');
        });
    }

    public function edit(News $news)
    {
        $news_categories = NewsCategory::all();
        return view('admin.news.edit', compact('news', 'news_categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'hook' => 'required|string|max:500',
            'published_at' => 'required|date',
            'category_id' => 'required|exists:news_categories,id',
            'image' => 'nullable|image|max:2048',
        ]);

        return DB::transaction(function () use ($request, $validated, $id) {
            $news = News::findOrFail($id);

            // SLUG (exclude current ID biar tidak bentrok dengan dirinya sendiri)
            $slug = Str::slug($validated['title']);
            $base = $slug;
            $i = 1;

            while (News::where('slug', $slug)->where('id', '!=', $news->id)->exists()) {
                $slug = $base . '-' . $i++;
            }

            // UPDATE NEWS
            $news->update([
                'title' => $validated['title'],
                'slug' => $slug,
                'content' => $validated['content'],
                'hook' => $validated['hook'],
                'published_at' => $validated['published_at'],
            ]);

            // SYNC CATEGORY (lebih tepat daripada attach)
            $news->news_categories()->sync([$validated['category_id']]);

            // UPDATE THUMBNAIL (kalau ada upload baru)
            if ($request->hasFile('image')) {
                // hapus gambar lama
                $news->clearMediaCollection('news-thumbnail');

                // upload baru
                $news
                    ->addMedia($request->file('image'))
                    ->usingFileName(time() . '.' . $request->file('image')->getClientOriginalExtension())
                    ->toMediaCollection('news-thumbnail');
            }

            return redirect()->route('admin.news.index')->with('success', 'News berhasil diupdate');
        });
    }

    public function destroy(News $news)
    {
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
    public function uploadImage(Request $request)
    {
        try {
            $request->validate(
                [
                    'file' => 'required|image|max:3072',
                    'draft_id' => 'nullable|integer',
                ],
                [
                    'file.required' => 'File wajib diupload.',
                    'file.image' => 'File harus berupa gambar.',
                    'file.max' => 'Ukuran file terlalu besar (maks 3MB).',
                ],
            );

            $draft = $request->draft_id ? MediaDraft::find($request->draft_id) : null;

            if (!$draft) {
                $draft = MediaDraft::create();
            }

            $media = $draft
                ->addMedia($request->file('file'))
                ->usingFileName(time() . '.' . $request->file('file')->getClientOriginalExtension())
                ->toMediaCollection('news-content');

            return response()->json([
                'location' => $media->getFullUrl(),
                'draft_id' => $draft->id,
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'message' => $e->validator->errors()->first('file'),
                ],
                422,
            );
        } catch (\Throwable $e) {
            return response()->json(
                [
                    'message' => 'Upload gagal: server error.',
                ],
                500,
            );
        }
    }
}
