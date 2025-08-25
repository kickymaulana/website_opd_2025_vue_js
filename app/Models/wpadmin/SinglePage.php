<?php

namespace App\Models\wpadmin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class SinglePage extends Model
{
    use HasUuids;
    protected $table = 'single_page';
    protected $primaryKey = 'id';
    public  $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nama',
    ];
}
