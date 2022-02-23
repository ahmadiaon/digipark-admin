<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid', 'name', 'is_url', 'url', 'path', 'mime_type', 'status',
    ];
    public function scopeFilter($query)
    {
        if (request('search')) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        }
    }
}
