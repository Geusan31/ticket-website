<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penumpang extends Authenticatable
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id_penumpang'];
    protected $table = 'penumpangs';
    protected $primaryKey = 'id_penumpang';

    public function pemesanan(): HasMany
    {
        return $this->hasMany(Pemesanan::class, 'id_pemesanan');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Penumpang::class, 'id_pembayaran');
    }
}
