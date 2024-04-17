<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'address_id',
        'status',
        'payment_id',
        'user_id',
        'quantity',
        'price',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order__products')
                    ->withPivot('quantity', 'price')
                    ->withTimestamps();;
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


}
