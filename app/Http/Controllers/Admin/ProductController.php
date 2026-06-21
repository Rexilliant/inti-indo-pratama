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

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('code', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        $products = $query->latest()->paginate($request->per_page ?? 5);
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

        $product = Product::create([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);

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

            $file->move(public_path('uploads/tinymce_images'), $filename);

            return response()->json([
                'location' => asset('uploads/tinymce_images/' . $filename)
            ]);
        }

        return response()->json(['error' => 'Gagal upload gambar.'], 400);
    }

    public function edit(Product $product)
    {
        return view('admin.our_product.edit', compact('product'));
    }


    public function update(Request $request, Product $product)
    {
        $request->validate([
            'code' => 'required|unique:products,code,' . $product->id,
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:3072',
        ]);

        $product->update([
            'code' => $request->code,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $product->clearMediaCollection('product_images');

            $product->addMediaFromRequest('image')
                ->toMediaCollection('product_images');
        }

        return redirect()->route('admin.our_product.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        $product->clearMediaCollection('product_images');
        $product->delete();

        return redirect()->route('admin.our_product.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}