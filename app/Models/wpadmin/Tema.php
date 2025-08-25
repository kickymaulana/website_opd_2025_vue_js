<?php

namespace App\Models\wpadmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Tema extends Model
{
    use HasUuids;
    protected $table = 'tema';
    protected $primaryKey = 'id';
    public  $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'tema',
        'status',
    ];

    public function hiasan()
    {
        return $this->hasMany(Hiasan::class, 'tema_id', 'id');
    }
}
