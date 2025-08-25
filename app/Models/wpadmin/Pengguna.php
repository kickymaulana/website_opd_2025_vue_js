<?php

namespace App\Models\wpadmin;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Authenticatable
{
    protected $table = 'pengguna';
    protected $primaryKey = 'username';
    public  $incrementing = false;
    protected $keyType = 'string';
    protected $hidden = ['password'];

    protected $fillable = [
        'username',
        'password',
        'nama',
    ];

}

