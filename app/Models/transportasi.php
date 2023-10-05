<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class transportasi extends Model
{
    use HasFactory;

    public function rute(): HasMany {
        return $this->hasMany(Rute::class);
    }

    public function type_treansportasi(): BelongsTo {
        return $this->belongsTo(type_treansportasi::class);
    }
}
