<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index');
    }

    public function add($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', []);

        // HITUNG DISKON
        $finalPrice = $product->price;

        if (!is_null($product->discount)) {
            $finalPrice = $product->price - ($product->price * $product->discount / 100);
        }

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "price" => $finalPrice,
                "original_price" => $product->price,
                "discount" => $product->discount,
                "quantity" => 1,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function update(Request $request, $id)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
            }
        }

        return redirect()->back();
    }

    public function remove($id)
    {
        if (session()->has('cart')) {
            $cart = session()->get('cart');

            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }

        return redirect()->back();
    }
}