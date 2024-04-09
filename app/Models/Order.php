<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'order_no',
        'address',
        'status',
        'pay_status',
        'notes',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order__products', 'order_id', 'product_id');
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }


}
