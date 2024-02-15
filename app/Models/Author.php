<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tag_id',
    ];

    public function tag_id(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
