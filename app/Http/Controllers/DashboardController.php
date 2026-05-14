<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category')->latest();

        // 🔍 SEARCH
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('brand', 'like', "%{$search}%");
            });
        }

        $products = $query->get();

        // 🔥 NEW ARRIVALS (ambil 10 terbaru)
        $newArrivals = Product::latest()->take(10)->get();

        return view('dashboard', compact('products', 'newArrivals'));
    }

    public function promotion()
    {
        $products = Product::with('promotions')
            ->whereHas('promotions', function ($q) {
                $q->where('start_date', '<=', now())
                    ->where('end_date', '>=', now());
            })
            ->get();

        $banners = Banner::where('is_active', true)->orderBy('order')->get(); // ← ganti ini

        return view('promotion', compact('products', 'banners')); // ← ganti 'banner' jadi 'banners'
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $product->price,
                "image" => $product->image,
                "quantity" => 1
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function bySkin($skin)
    {
        $products = Product::where('skin_type', $skin)->get();
        return view('dashboard', compact('products'));
    }

    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->products;

        return view('dashboard', compact('products'));
    }
    public function newArrivals()
    {
        $products = Product::where('created_at', '>=', now()->subDays(7))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('new-arrivals', compact('products'));
    }
    public function bestSeller()
    {
        $products = Product::withSum('orderItems', 'quantity')
            ->orderByDesc('order_items_sum_quantity')
            ->get();

        return view('best-seller', compact('products'));
    }
}
