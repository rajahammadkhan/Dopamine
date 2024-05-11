<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PackageDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'package_id',
        'language_id',
        'title',
        'country',
        'city',
        'description',
    ];
}
