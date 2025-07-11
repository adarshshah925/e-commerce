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

                // Update the order's total price
                $order->update(['total_price' => $totalPrice]);
            }
        });
    }
}
