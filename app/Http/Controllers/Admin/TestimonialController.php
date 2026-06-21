<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);
        return view('admin.testimoni.index', compact('testimonials'));
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
            'image' => 'required',
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
