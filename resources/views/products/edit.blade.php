@extends('layouts.app')

@section('content')
    <h1
        style="text-align: center; font-family: 'Roboto', sans-serif; color: #2c3e50; font-size: 2.5rem; margin-bottom: 20px;">
        Edit Product
    </h1>
    <form action="{{ route('products.update', $product) }}" method="POST"
        style="max-width: 600px; margin: 0 auto; font-family: 'Roboto', sans-serif; background-color: #ffffff; padding: 30px; border-radius: 10px; box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);">
        @csrf
        @method('PUT')
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; font-weight: 600; color: #34495e; margin-bottom: 8px;">Name:</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required
                style="width: 100%; padding: 12px; border: 1px solid #dcdcdc; border-radius: 6px; font-size: 16px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="description"
                style="display: block; font-weight: 600; color: #34495e; margin-bottom: 8px;">Description:</label>
            <textarea id="description" name="description" required
                style="width: 100%; padding: 12px; border: 1px solid #dcdcdc; border-radius: 6px; font-size: 16px; min-height: 120px;">{{ $product->description }}</textarea>
        </div>
        <div style="margin-bottom: 20px;">
            <label for="price"
                style="display: block; font-weight: 600; color: #34495e; margin-bottom: 8px;">Price:</label>
            <input type="number" id="price" name="price" step="0.01" value="{{ $product->price }}" required
                style="width: 100%; padding: 12px; border: 1px solid #dcdcdc; border-radius: 6px; font-size: 16px;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="stock"
                style="display: block; font-weight: 600; color: #34495e; margin-bottom: 8px;">Stock:</label>
            <input type="number" id="stock" name="stock" value="{{ $product->stock }}" required
                style="width: 100%; padding: 12px; border: 1px solid #dcdcdc; border-radius: 6px; font-size: 16px;">
        </div>
        <button type="submit"
            style="background-color: #3498db; color: white; padding: 14px 28px; border: none; border-radius: 6px; cursor: pointer; font-size: 18px; font-weight: 600; transition: background-color 0.3s;">
            Update Product
        </button>
    </form>
    <style>
        button:hover {
            background-color: #2980b9;
        }
    </style>
@endsection
