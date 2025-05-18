@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6 bg-white shadow-md rounded">
        <h1 class="text-2xl font-bold mb-4">Customers</h1>

        <!-- Search Form -->
        <form method="GET" action="{{ route('customers.index') }}" class="mb-6">
            <div class="flex items-center space-x-4">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email"
                    class="border border-gray-300 rounded px-4 py-2 w-full">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Search</button>
            </div>
        </form>

        <table class="table-auto w-full border-collapse border border-gray-300 mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2">Name</th>
                    <th class="border border-gray-300 px-4 py-2">Email</th>
                    <th class="border border-gray-300 px-4 py-2">Total Orders</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $customer->name }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $customer->email }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $customer->orders_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $customers->links('pagination::tailwind') }}
        </div>
    </div>
@endsection
