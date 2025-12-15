<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class N_kesepahaman extends Model
{
    use HasFactory;

    protected $table = 'n_kesepahaman';

    protected $fillable = [
        'name_instansi',
        'no_instansi',
        'no_poltekes',
        'start',
        'end',
        'name',
        'position',
        'address',
        'image',
        'nip',
    ];
}
