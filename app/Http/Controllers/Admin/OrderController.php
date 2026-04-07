<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('items')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }
    public function dashboard()
    {
        $totalOrders = \App\Models\Order::count();
        $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
        $totalRevenue = \App\Models\Order::sum('total');
        $latestOrders = \App\Models\Order::latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalOrders',
            'pendingOrders',
            'totalRevenue',
            'latestOrders'
        ));
    }
    public function updateStatus(Request $request, $id)
    {
        $order = \App\Models\Order::findOrFail($id);

        $order->update([
            'status' => $request->status
        ]);

        return redirect()->back()->with('success', 'Status berhasil diupdate');
    }
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')
            ->with('success', 'Data berhasil dihapus');
    }
}