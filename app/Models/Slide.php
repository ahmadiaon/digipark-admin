<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid', 'gallery_uuid', 'admin_uuid', 'title', 'status',
    ];
}
