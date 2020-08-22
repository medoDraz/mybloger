<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Vistor extends Model
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'email','name','phone', 'password',
    ];
}
