<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moive extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'poster',
        'intro',
        'release_date',
        'genre_id',
    ];
    public function gene()
    {
        return $this->belongsTo(Gene::class, 'genre_id');
    }

}
