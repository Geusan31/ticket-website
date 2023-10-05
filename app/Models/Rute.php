<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rute extends Model
{
    use HasFactory;

    public function pemesanan(): BelongsTo {
        return $this->hasMany(pemesanan::class);
    }

    public function tranportasi(): BelongsTo {
        return $this->belongsTo(transportasi::class);
    }
}
