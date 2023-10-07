<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class petugas extends Model
{
    use HasFactory;
    protected $guarded = ['id_petugas'];
    public $timestamps = false;
    protected $table = 'petugas';

    public function level(): BelongsTo {
        return $this->belongsTo(level::class);
    }

    public function pemesanan(): HasMany {
        return $this->hasMany(pemesanan::class);
    }
}
