<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    use HasFactory;

    protected $table= 'plants'; 

    protected $primaryKey= 'id'; 

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image_url',
        'occasion_id',
    ];

    public function plantOccasions()
    {
        return $this->belongsToMany(Occasion::class, 'plant_occasions');
    }
}
