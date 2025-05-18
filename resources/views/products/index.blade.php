@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; font-family: Arial, sans-serif;">Products</h1>
    <a href="{{ route('products.create') }}"
        style="display: inline-block; margin-bottom: 15px; background-color: #28A745; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px;">Add
        Product</a>
    <table style="width: 100%; border-collapse: collapse; font-family: Arial, sans-serif;">
        <thead>
            <tr>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Name</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Price</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Stock</th>
                <th style="border: 1px solid #ddd; padding: 8px; text-align: left;">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->name }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->price }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">{{ $product->stock }}</td>
                    <td style="border: 1px solid #ddd; padding: 8px;">
                        <a href="{{ route('products.edit', $product) }}"
                            style="background-color: #FFC107; color: white; padding: 5px 10px; text-decoration: none; border-radius: 4px;">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                style="background-color: #DC3545; color: white; padding: 5px 10px; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="margin-top: 15px;">
        {{ $products->links() }}
    </div>
@endsection
