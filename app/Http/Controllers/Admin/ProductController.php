<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter Pencarian
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('code', 'like', '%' . $request->search . '%');
        }

        // Filter Tanggal
        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $products = $query->latest()->paginate($request->per_page ?? 10);
        return view('admin.our_product.index', compact('products'));
    }

    public function create()
    {
        return view('admin.our_product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:products,code',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        // 1. Simpan data ke database sekali saja
        $product = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 2. Cek apakah file benar-benar ada di request
        if ($request->hasFile('image')) {
            $product->addMediaFromRequest('image')
                ->toMediaCollection('product_images');
        }

        return redirect()->route('admin.our_product.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function uploadTinyMce(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();

            // Menyimpan file ke storage/app/public/tinymce_images
            $path = $file->storeAs('tinymce_images', $filename, 'public');

            // AMAN: Kita bungkus pakai helper asset() supaya return URL-nya lengkap/absolut beserta domain/localhost-nya
            return response()->json([
                'location' => asset('storage/tinymce_images/' . $filename)
            ]);
        }

        return response()->json(['error' => 'Gagal upload gambar.'], 400);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.our_product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // 1. Validasi
        // Catatan: 'unique:products,code,' . $product->id artinya boleh pakai kode yang sama
        // asalkan kodenya adalah milik produk yang sedang diedit ini.
        $request->validate([
            'code' => 'required|unique:products,code,' . $product->id,
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        // 2. Update Data
        $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        // 3. Update Gambar (Spatie Media Library)
        if ($request->hasFile('image')) {
            // Hapus gambar lama agar storage tidak penuh
            $product->clearMediaCollection('product_images');

            // Simpan gambar baru
            $product->addMediaFromRequest('image')
                ->toMediaCollection('product_images');
        }

        return redirect()->route('admin.our_product.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Spatie otomatis menghapus media yang terikat kalau kita hapus modelnya
        // tapi cara paling aman/bersih adalah:
        $product->clearMediaCollection('product_images');
        $product->delete();

        return redirect()->route('admin.our_product.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}