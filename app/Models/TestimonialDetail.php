<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonialDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'testimonial_id',
        'language_id',
        'title',
        'description',
        'comment',
    ];
}
