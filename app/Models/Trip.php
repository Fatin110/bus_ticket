<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $fillable = ['to','price','date','time','seats'];

    function users(){
        return $this->belongsToMany(User::class);
    }
    function seats(){
        return $this->hasMany(Seat::class);
    }
}
