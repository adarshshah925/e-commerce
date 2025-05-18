<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'total_price',
        'status',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'products')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    /**
     * Get the items for the order.
     */
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    /**
     * Get the customer for the order.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
