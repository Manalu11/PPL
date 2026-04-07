<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')
                ->store('products', 'public');
        }

        Product::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'discount' => $request->discount,
            'product_type' => $request->product_type,
            'skin_type' => $request->skin_type,
            'category_id' => $request->category_id,
            'is_new' => $request->has('is_new'),
            'image' => $imagePath
            description' => $request->description,
        ]);

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }



    public function update(Request $request, Product $product)
    {
        $imagePath = $product->image;

        if ($request->hasFile('image')) {

            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }

            $imagePath = $request->file('image')
                ->store('products', 'public');
        }

        $product->update([
            'name' => $request->name,
            'brand' => $request->brand,
            'price' => $request->price,
            'discount' => $request->discount,
            'product_type' => $request->product_type,
            'skin_type' => $request->skin_type,
            'category_id' => $request->category_id,
            'is_new' => $request->has('is_new'),
            'image' => $imagePath
        ]);

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Produk 
         dihapus');
    }

    public function exportPdf()
    {
        $products = Product::with('category')->get();
        $pdf = Pdf::loadView('admin.products.pdf', compact('products'));
        return $pdf->stream('laporan-produk.pdf');
    }
    public function bulkDelete(Request $request)
    {
        if ($request->ids) {

            $products = Product::whereIn('id', $request->ids)->get();

            foreach ($products as $product) {
                if ($product->image) {
                    Storage::delete('public/' . $product->image);
                }
            }

            Product::whereIn('id', $request->ids)->delete();

            return redirect()->back()->with('success', 'Produk berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Tidak ada produk yang dipilih.');
    }
}