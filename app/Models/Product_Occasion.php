<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_Occasion extends Model
{
    use HasFactory;
    protected $table = 'product_occasions';

    protected $fillable = [
        'product_id',
        'occasion_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function occasion()
    {
        return $this->belongsTo(Occasion::class);
    }
}
