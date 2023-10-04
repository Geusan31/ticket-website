<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pemesanan extends Model
{
    use HasFactory;

    public function penumpang(): BelongsTo
    {
        return $this->belongsTo(penumpang::class);
    }
}
