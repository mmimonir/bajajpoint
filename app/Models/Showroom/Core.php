<?php

namespace App\Models\Showroom;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;



class Core extends Model
{
    use HasFactory;
    protected $guarded = [];



    // public function vehicles()
    // {
    //     return $this->hasMany(Vehicle::class, 'foreign_key', 'ModelCode');
    // }
}
