<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'portfolio_category_id',
        'title',
        'file',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return string
     */
    public function getImageAttribute(): string
    {
        return asset('storage/portfolio/'.$this->file);
    }

    public function getFileLocationAttribute(): string
    {
        return 'portfolio/'.$this->file;
    }
}
