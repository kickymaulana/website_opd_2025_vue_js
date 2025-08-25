<?php

namespace App\Models\wpadmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Artikel extends Model
{
    use HasUuids;
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    public  $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'judul',
        'slug',
        'artikel',
        'status',
        'waktu',
    ];
}
