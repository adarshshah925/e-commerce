@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">Products</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('products.index') }}" class="mb-6">
            <div class="flex items-center space-x-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name"
                    class="border border-gray-300 rounded px-4 py-2 w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
            </div>
        </form>

        <a href="{{ route('products.create') }}"
            class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 mb-6 inline-block">Add Product</a>

        <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Price</th>
                    <th class="border border-gray-300 px-4 py-2">Stock</th>
                    <th class="border border-gray-300 px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">${{ number_format($product->price, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $product->stock }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <form action="{{ route('products.edit', $product) }}" method="GET" class="inline">
                                <button type="submit"
                                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Edit</button>
                            </form>
                            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $products->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
