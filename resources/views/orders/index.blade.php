@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">Orders</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('orders.index') }}" class="mb-6">
            <div class="flex items-center space-x-4">
                <input type="text" name="customer_name" value="{{ request('customer_name') }}"
                    placeholder="Search by customer name" class="border border-gray-300 rounded px-4 py-2 w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
            </div>
        </form>

        <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Customer</th>
                    <th class="border border-gray-300 px-4 py-2">Total Price</th>
                    <th class="border border-gray-300 px-4 py-2">Status</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $order->customer->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ ucfirst($order->status) }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <a href="{{ route('orders.show', $order) }}" class="text-blue-500 hover:underline">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $orders->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
