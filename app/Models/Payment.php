<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $primaryKey = 'transaction_id';

    protected $fillable = [
        'user_id',
        'amount',
        'payment_method',
        'status',
        'transaction_id',
        'billing_id',
        'card_id',
        'refunder'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id'); 
    }

}
