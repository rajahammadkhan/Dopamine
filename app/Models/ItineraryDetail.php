<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItineraryDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'itinerary_id',
        'language_id',
        'itinerary_name',
        'itinerary_description',
    ];
}
