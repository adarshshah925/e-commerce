@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; font-family: Arial, sans-serif;">Add Product</h1>
    <form action="{{ route('products.store') }}" method="POST"
        style="max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif;">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="name" style="display: block; font-weight: bold;">Name:</label>
            <input type="text" id="name" name="name" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="description" style="display: block; font-weight: bold;">Description:</label>
            <textarea id="description" name="description" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="price" style="display: block; font-weight: bold;">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="stock" style="display: block; font-weight: bold;">Stock:</label>
            <input type="number" id="stock" name="stock" required
                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <button type="submit"
            style="background-color: #007BFF; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">Add
            Product</button>
    </form>
@endsection
