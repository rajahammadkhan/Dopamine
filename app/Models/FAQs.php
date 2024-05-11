<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FAQs extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id',
        'language_id',
        'faqs_question',
        'faqs_answer',
    ];
}
