<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'stock',
        'product_code',
        'unit_price',
    ];

    // Add the order details relationship
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class, 'product_id');
    }
}
