<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = "addresses";

    protected $fillable = [
        "street",
        "city",
        "state",
        "country",
        "zip",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
