<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestStar extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'event_id',
        'performance_time'
    ];

    protected $table = 'guest_star';
}
