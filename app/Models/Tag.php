<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function books(): HasManyThrough
    {
        return $this->hasManyThrough(Book::class, User::class);
    }
}
