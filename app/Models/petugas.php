<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Petugas extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id_petugas'];
    public $timestamps = false;
    protected $primaryKey = 'id_petugas';
    protected $table = 'petugas';

    public function level(): BelongsTo {
        return $this->belongsTo(Level::class);
    }

    public function pemesanan(): HasMany {
        return $this->hasMany(Pemesanan::class);
    }

    public function rute(): HasMany {
        return $this->hasMany(Rute::class);
    }
}
