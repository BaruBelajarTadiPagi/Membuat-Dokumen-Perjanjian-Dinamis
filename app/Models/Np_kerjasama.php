<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Np_kerjasama extends Model
{
    use HasFactory;
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
