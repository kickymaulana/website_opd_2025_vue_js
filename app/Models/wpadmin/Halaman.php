<?php

namespace App\Models\wpadmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Halaman extends Model
{
    use HasUuids;
    protected $table = 'halaman';
    protected $primaryKey = 'id';
    public  $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'judul',
        'slug',
        'halaman',
        'status',
        'mode',
        'waktu',
    ];
}
