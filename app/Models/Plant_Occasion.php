<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlantOccasion extends Model
{
    use HasFactory;

    protected $table = 'plant_occasions';

    protected $fillable = [
        'plant_id',
        'occasion_id',
    ];

    public function plant()
    {
        return $this->belongsTo(Plant::class);
    }

    public function occasion()
    {
        return $this->belongsTo(Occasion::class);
    }
}
