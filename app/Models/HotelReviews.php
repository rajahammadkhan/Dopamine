<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelReviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'package_id',
        'rating',
        'name',
        'email',
        'comment',
    ];
}
