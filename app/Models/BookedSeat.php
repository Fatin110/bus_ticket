<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookedSeat extends Model
{
    use HasFactory;

    protected $fillable = ['booked_by','phone','trip_id', 'user_id'];
}
