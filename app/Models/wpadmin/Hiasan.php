<?php

namespace App\Models\wpadmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Hiasan extends Model
{
    use HasUuids;
    protected $table = 'hiasan';
    protected $primaryKey = 'id';
    public  $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
        'hiasan',
        'urutan',
        'tipe_id',
        'tema_id',
        'single_page_id',
    ];

    public function tema()
    {
        return $this->belongsTo(Tema::class, 'tema_id', 'id');
    }
    public function tipe()
    {
        return $this->belongsTo(Tipe::class, 'tipe_id', 'id');
    }
}
