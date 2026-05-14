<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CheckoutController extends Controller
{
    public function index()
    {
        if (!session('cart') || count(session('cart')) == 0) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        return view('checkout.index');
    }

    public function process(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'address' => 'required|string',
            'phone'   => 'required|string|max:20',
        ]);

        $cart = session('cart');

        if (!$cart || count($cart) == 0) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong!');
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = DB::transaction(function () use ($request, $cart, $total) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'name'    => $request->name,
                'address' => $request->address,
                'phone'   => $request->phone,
                'total'   => $total,
                'status'  => 'pending'
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id'     => $order->id,
                    'product_name' => $item['name'],
                    'price'        => $item['price'],
                    'quantity'     => $item['quantity'],
                ]);
            }

            return $order;
        });

        session()->forget('cart');

        return redirect()->route('checkout.payment', $order->id);
    }

    public function payment($id)
    {
        $order = Order::with('orderItems')->findOrFail($id);
        return view('checkout.payment', compact('order'));
    }

    public function confirmPayment(Request $request, $id)
    {
        $request->validate([
            'payment_method' => 'required|in:transfer_bca,transfer_mandiri,cod',
        ]);

        $order = Order::findOrFail($id);
        $order->update([
            'payment_method' => $request->payment_method,
            'status'         => 'waiting_payment'
        ]);

        return redirect('/')->with('success', 'Pesanan berhasil! Silakan lakukan pembayaran sesuai metode yang dipilih.');
    }
    public function show($id)
{
    $order = Order::with('items.product')->findOrFail($id);

    return view('orders.show', compact('order'));
}
}
