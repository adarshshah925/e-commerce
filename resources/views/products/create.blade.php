@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; font-family: 'Roboto', sans-serif; font-size: 2rem; color: #333;">Add Product
    </h1>
    <form action="{{ route('products.store') }}" method="POST"
        style="max-width: 600px; margin: 20px auto; font-family: 'Roboto', sans-serif; background-color: #f9f9f9; padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
        @csrf
        <div style="margin-bottom: 20px;">
            <label for="name" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Name:</label>
            <input type="text" id="name" name="name" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="description"
                style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Description:</label>
            <textarea id="description" name="description" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem; height: 100px;"></textarea>
        </div>
        <div style="margin-bottom: 20px;">
            <label for="price" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem;">
        </div>
        <div style="margin-bottom: 20px;">
            <label for="stock" style="display: block; font-weight: 500; margin-bottom: 5px; color: #555;">Stock:</label>
            <input type="number" id="stock" name="stock" required
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 6px; font-size: 1rem;">
        </div>
        <button type="submit"
            style="background-color: #007BFF; color: white; padding: 12px 20px; border: none; border-radius: 6px; font-size: 1rem; cursor: pointer; transition: background-color 0.3s;">
            Add Product
        </button>
    </form>
@endsection
