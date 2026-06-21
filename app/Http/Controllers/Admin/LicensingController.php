<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyLicense;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class LicensingController extends Controller
{
    public function index(Request $request)
    {
        $query = CompanyLicense::latest();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $perPage = $request->input('per_page', 5);
        $licenses = $query->paginate($perPage)->withQueryString();

        return view('admin.company_licensing.index', compact('licenses'));
    }

    public function create()
    {
        return view('admin.company_licensing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'document' => 'required|image|mimes:png,jpg,jpeg|max:3072', // Hanya gambar & max 3MB
        ]);

        $license = CompanyLicense::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        if ($request->hasFile('document')) {
            $license->addMediaFromRequest('document')->toMediaCollection('licenses');
        }

        return redirect()->route('admin.company_licensing.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $license = CompanyLicense::findOrFail($id);
        return view('admin.company_licensing.edit', compact('license'));
    }

    public function update(Request $request, $id)
    {
        $license = CompanyLicense::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'document' => 'nullable|image|mimes:png,jpg,jpeg|max:3072',
        ]);

        $license->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
        ]);

        if ($request->hasFile('document')) {
            $license->clearMediaCollection('licenses');
            $license->addMediaFromRequest('document')->toMediaCollection('licenses');
        }

        return redirect()->route('admin.company_licensing.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        CompanyLicense::findOrFail($id)->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    public function download($id)
    {
        $license = \App\Models\CompanyLicense::findOrFail($id);

        $media = $license->getFirstMedia('licenses');

        if (!$media) {
            abort(404, 'File tidak ditemukan.');
        }

        return response()->download($media->getPath(), $media->file_name);
    }
}