<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Promotion;
use App\Models\Product;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromotionController extends Controller
{
    public function index()
    {
        $promotions = Promotion::withCount('products')->latest()->get();
        $banners = Banner::where('is_active', true)->orderBy('order')->get();

        return view('admin.promotions.index', compact('promotions', 'banners'));
    }

    public function create()
    {
        $products = Product::all();
        return view('admin.promotions.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'products'    => 'array',
            'products.*'  => 'exists:products,id',
            'discounts'   => 'array',
            'discounts.*' => 'nullable|integer|min:1|max:100',
        ]);

        $promo = Promotion::create($request->only('name', 'start_date', 'end_date'));

        $sync = [];
        foreach ($request->products ?? [] as $productId) {
            $sync[$productId] = ['discount' => $request->discounts[$productId] ?? 0];
        }
        $promo->products()->sync($sync);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promo berhasil dibuat!');
    }

    public function edit(Promotion $promotion)
    {
        $products = Product::all();
        $selected = $promotion->products->keyBy('id');
        return view('admin.promotions.edit', compact('promotion', 'products', 'selected'));
    }

    public function update(Request $request, Promotion $promotion)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date|after_or_equal:start_date',
            'products'    => 'array',
            'discounts.*' => 'nullable|integer|min:1|max:100',
        ]);

        $promotion->update($request->only('name', 'start_date', 'end_date'));

        $sync = [];
        foreach ($request->products ?? [] as $productId) {
            $sync[$productId] = ['discount' => $request->discounts[$productId] ?? 0];
        }
        $promotion->products()->sync($sync);

        return redirect()->route('admin.promotions.index')
            ->with('success', 'Promo berhasil diupdate!');
    }

    public function destroy(Promotion $promotion)
    {
        $promotion->products()->detach();
        $promotion->delete();

        return back()->with('success', 'Promo berhasil dihapus!');
    }

    // ===== BANNER METHODS =====

    public function updateBanner(Request $request)
    {
        $request->validate([
            'banners'   => 'required|array',
            'banners.*' => 'image|mimes:jpg,jpeg,png,webp|max:5120',
        ]);

        foreach ($request->file('banners') as $index => $file) {
            $path = $file->store('banners', 'public');
            Banner::create([
                'image'  => $path,
                'order'  => Banner::max('order') + 1,
            ]);
        }

        return back()->with('success', 'Banner berhasil ditambahkan!');
    }

    public function destroyBanner(Request $request)
    {
        $banner = Banner::findOrFail($request->banner_id);
        Storage::disk('public')->delete($banner->image);
        $banner->delete();

        return back()->with('success', 'Banner berhasil dihapus!');
    }
}
