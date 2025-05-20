<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name', 'description', 'price', 'buy','stock', 'image', 'views'
    ];

    public function categories() {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function orders() {
        return $this->belongsToMany(Order::class, 'order_products')
            ->withPivot('amount', 'price');
    }
}
