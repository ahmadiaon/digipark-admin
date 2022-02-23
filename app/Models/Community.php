<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'community_category_uuid',
        'name',
        'logo_path',
        'address',
        'city',
        'province',
        'description',
        'image_path',
        'location',
        'facebook',
        'instagram',
        'youtube',
        'status',
    ];
}
