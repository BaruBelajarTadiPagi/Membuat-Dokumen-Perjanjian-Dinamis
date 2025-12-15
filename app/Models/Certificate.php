<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'published_at',
        'category_id',

    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
