@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">Order Details</h1>
        <p class="mb-2"><strong>Customer:</strong> {{ $order->customer->name }}</p>
        <p class="mb-2"><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>
        <p class="mb-4"><strong>Status:</strong> {{ ucfirst($order->status) }}</p>

        <h2 class="text-xl font-semibold mb-3">Items</h2>
        <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Product</th>
                    <th class="border border-gray-300 px-4 py-2">Quantity</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $item->quantity }}</td>
                        <td class="border border-gray-300 px-4 py-2">${{ number_format($item->price, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('orders.update', $order) }}" method="POST" class="bg-gray-50 p-4 rounded shadow-sm">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Change Status:</label>
                <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                    <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </form>
    </div>
@endsection
