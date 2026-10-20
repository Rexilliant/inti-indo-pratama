<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index(Request $request)
    {
        $query = Testimonial::query();

        // Filter nama
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filter tanggal
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        // Filter provinsi
        if ($request->filled('province')) {
            $query->where('province', $request->province);
        }

        // Pagination
        $perPage = $request->get('per_page', 10);

        $testimonials = $query->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->all()); // penting biar filter tidak hilang saat pagination

        $provinces = Testimonial::select('province')->whereNotNull('province')->where('province', '!=', '')->distinct()->orderBy('province')->pluck('province');

        return view('admin.testimoni.index', compact('testimonials', 'provinces'));
    }

    public function create()
    {
        return view('admin.testimoni.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'province' => 'required',
            'city' => 'required',
            'country' => 'required',
            'comment' => 'required',
            'image' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $testimonial = Testimonial::create([
                'name' => $request->name,
                'province' => $request->province,
                'city' => $request->city,
                'country' => $request->country,
                'comment' => $request->comment,
                'status' => 'published',
            ]);

            if ($request->hasFile('image')) {
                $testimonial
                    ->addMedia($request->file('image'))
                    ->usingFileName(time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension())
                    ->toMediaCollection('testimonial');
            }

            DB::commit();

            return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil ditambahkan');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', $th->getMessage()); // biar ketahuan error aslinya
        }
    }

    public function edit(Testimonial $testimonial)
    {
        $image = $testimonial->getFirstMediaUrl('testimonial');

        return view('admin.testimoni.edit', compact('testimonial', 'image'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'name' => 'required',
            'province' => 'required',
            'city' => 'required',
            'country' => 'required',
            'comment' => 'required',
            // 'image' => 'required',
            'status' => 'required',
        ]);

        try {
            DB::beginTransaction();

            $testimonial->update([
                'name' => $request->name,
                'province' => $request->province,
                'city' => $request->city,
                'country' => $request->country,
                'comment' => $request->comment,
                'status' => $request->status,
            ]);

            if ($request->hasFile('image')) {
                $testimonial->clearMediaCollection('testimonial');
                $testimonial
                    ->addMedia($request->file('image'))
                    ->usingFileName(time() . '_' . uniqid() . '.' . $request->file('image')->getClientOriginalExtension())
                    ->toMediaCollection('testimonial');
            }

            DB::commit();

            return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil diupdate');
        } catch (\Throwable $th) {
            DB::rollBack();

            return back()->with('error', $th->getMessage()); // biar ketahuan error aslinya
        }
    }
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimoni berhasil dihapus');
    }
}
