<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('customer');

        // Apply search filter if 'customer_name' is provided
        if ($request->has('customer_name') && $request->customer_name) {
            $query->whereHas('customer', function ($q) use ($request) {
                $q->where('name', 'like', '%'.$request->customer_name.'%');
            });
        }

        $orders = $query->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('customer', 'items.product');

        return view('orders.show', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $request->validate(['status' => 'required|string']);
        $order->update(['status' => $request->status]);

        return redirect()->route('orders.index')->with('success', 'Order status updated successfully.');
    }
}
