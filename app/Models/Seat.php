<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = ['seat_number','booked','trip_id'];

    function users(){
        return $this->belongsTo(User::class);
    }

    function trips(){
        return $this->belongsTo(Trip::class);
    }
}
