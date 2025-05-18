<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        // Create at least 5 customers
        Customer::factory(5)->create()->each(function ($customer) use ($products) {
            // Each customer places 2-5 orders
            for ($i = 0; $i < rand(2, 5); ++$i) {
                // Randomly select two products
                $selectedProducts = $products->random(1);

                $quantity = rand(1, 5);
                // Calculate the total price of the selected products
                $totalPrice = $selectedProducts->sum(function ($product) use ($quantity) {
                    $quantity = rand(1, 5); // Randomly select a quantity between 1 and 5

                    return $product->price * $quantity;
                });

                // Create an order with the total price
                $order = Order::factory()->create([
                    'customer_id' => $customer->id,
                    'total_price' => $totalPrice,
                ]);

                // Insert each selected product into the orders_items table
                DB::table('order_items')->insert([
                    'order_id' => $order->id,
                    'product_id' => $selectedProducts->toArray()[0]['id'],
                    'quantity' => $quantity, // Assuming quantity is 1 for each product
                    'price' => $selectedProducts->toArray()[0]['price'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                // Attach products to the order with quantities
                // $order->products()->attach($orderItems);

                // Calculate total price for the order

                // Update the order's total price
                $order->update(['total_price' => $totalPrice]);
            }
        });

        for ($i = 1; $i <= 20; ++$i) {
            DB::table('customers')->insert([
                'name' => "Customer $i",
                'email' => "customer$i@example.com",
                'phone' => rand(1000000000, 9999999999),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
