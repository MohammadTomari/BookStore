<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'price',
        'year',
        'tag_id',
    ];

    public function tag_id(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function author_id(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
}
