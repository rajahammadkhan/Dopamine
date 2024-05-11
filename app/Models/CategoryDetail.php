<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryDetail extends Model
{
    use HasFactory;
    protected $table = 'category_details';
    protected $fillable = [
        'title',
        'category_id',
        'language_id',
        'description',
    ];
}
