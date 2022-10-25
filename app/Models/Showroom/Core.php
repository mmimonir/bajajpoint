<?php

namespace App\Models\Showroom;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Core extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function vehicles()
    // {
    //     return $this->hasMany(Vehicle::class, 'foreign_key', 'ModelCode');
    // }
}
