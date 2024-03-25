<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Occasion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function plants()
    {
        return $this->belongsToMany(Plant::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
