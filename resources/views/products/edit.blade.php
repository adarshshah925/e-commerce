@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; font-family: Arial, sans-serif;">Edit Product</h1>
    <form action="{{ route('products.update', $product) }}" method="POST"
        style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif;">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: bold;">Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; font-weight: bold;">Description:</label>
            <textarea id="description" name="description" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">{{ $product->description }}</textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; font-weight: bold;">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="stock" style="display: block; font-weight: bold;">Stock:</label>
            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <button type="submit"
            style="background-color: #007BFF; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Update
            Product</button>
    </form>
@endsection
