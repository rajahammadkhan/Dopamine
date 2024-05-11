<?php

namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'blog_id',
        'language_id',
        'short_description',
        'long_description',
    ];
}
