<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';

    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
        'card_last_four',
        'card_type',
        'notes',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
