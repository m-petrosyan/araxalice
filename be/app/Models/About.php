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

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/about/'.$this->image) : null;
    }

    public function getFileLocationAttribute(): string
    {
        return 'about/'.$this->image;
    }
}
