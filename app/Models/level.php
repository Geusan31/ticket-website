<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class level extends Model
{
    use HasFactory;

    public function petugas(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
