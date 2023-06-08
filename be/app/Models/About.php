<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'text',
        'image',
    ];

    public function getImageUrlAttribute(): string
    {
        return asset('storage/about/'.$this->image);
    }

    public function getFileLocationAttribute(): string
    {
        return 'about/'.$this->image;
    }
}
