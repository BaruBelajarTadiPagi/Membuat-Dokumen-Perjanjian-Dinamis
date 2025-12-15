<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou_international extends Model
{
    use HasFactory;
    protected $fillable = [
        'name_instansi',
        'no_instansi',
        'no_poltekes',
        'start',
        'end',
        'name_1',
        'position_1',
        'name_2',
        'position_2',
        'address',
        'image',
    ];
}
