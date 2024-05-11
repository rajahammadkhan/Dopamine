<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'language_id',
        'title',
        'country',
        'city',
        'description',
        'address',
    ];
}
