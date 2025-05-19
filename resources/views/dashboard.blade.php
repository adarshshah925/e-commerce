<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>

        <div class="p-6 text-gray-900">
            <!-- Add navigation tabs -->
            <nav class="mb-4">
                <ul class="flex space-x-4">
                    <li>
                        <a href="{{ route('orders.index') }}" class="text-blue-500 hover:underline">Orders</a>
                    </li>
                    <li>
                        <a href="{{ route('customers.index') }}" class="text-blue-500 hover:underline">Customers</a>
                    </li>
                    <li>
                        <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Products</a>
                    </li>
                </ul>
            </nav>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
