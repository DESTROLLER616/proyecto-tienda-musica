<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'song_number',
        'total_time',
        'credits',
        'label_id',
        'artist_id',
        'release_date',
        'quality_id',
        'cover_image_path',
        'price',
    ];
}
