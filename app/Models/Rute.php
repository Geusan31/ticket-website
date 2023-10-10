<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rute extends Model
{
    use HasFactory;

    protected $guarded = ['id_rute'];
    public $timestamps = false;
    protected $primaryKey = 'id_rute';
    protected $table = 'rutes';

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }

    public function transportasi(): BelongsTo
    {
        return $this->belongsTo(Transportasi::class, 'id_transportasi');
    }
}
