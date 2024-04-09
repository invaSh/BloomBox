<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $table = 'products';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'imgUrl',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function productOccasions()
    {
        return $this->belongsToMany(Occasion::class, 'product__occasions');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order__products', 'product_id', 'order_id');
    }
}
