<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "user_id",
    ];

    protected $table = 'carts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'cart__products')->withPivot('quantity');
    }

    public function getTotalQuantityAttribute()
    {
        return $this->products->sum(function ($product) {
            return $product->pivot->quantity;
        });
    }
}
