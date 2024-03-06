<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'product_name',
        'price',
        'seller_id',
        'user_id',
        'quantity',
        'category'
    ];

    public function seller() {
        return $this->belongsTo(Seller::class, 'user_id', 'user_id');
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }
}

