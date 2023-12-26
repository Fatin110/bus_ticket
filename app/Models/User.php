<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name', 'email', 'phone', 'password',
    ];

    function trips(){
        return $this->belongsToMany(Trip::class);
    }

    function seats(){
        return $this->hasMany(Seat::class);
    }


}
