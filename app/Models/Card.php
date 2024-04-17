<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = [ 
        "number", "expiration_date", "cvc","holder","user_id",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
