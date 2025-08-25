<?php

namespace App\Models\wpadmin;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

use Illuminate\Database\Eloquent\Model;

class Tipe extends Model
{
    use HasUuids;
    protected $table = 'tipe';
    protected $primaryKey = 'id';
    public  $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'tipe',
    ];

    public function hiasan()
    {
        return $this->hasMany(Hiasan::class, 'tipe_id', 'id');
    }
}
