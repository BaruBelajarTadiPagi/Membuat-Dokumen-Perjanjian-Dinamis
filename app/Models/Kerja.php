<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerja extends Model
{
    use HasFactory;
    protected $fillable = [
        'poltekkes_no',
        'rs_no',
        'rs_name',
        'rs_address',
        'published_at',
        'dr_name',
        'dr_nip',
    ];
}
