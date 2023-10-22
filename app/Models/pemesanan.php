<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id_pemesanan'];
    public $timestamps = false;
    protected $primaryKey = 'id_pemesanan';
    protected $table = 'pemesanans';
    // protected $with = ['penumpangs'];

    public function penumpang(): BelongsTo
    {
        return $this->belongsTo(penumpang::class, 'id_penumpang');
    }

    public function rute(): BelongsTo {
        return $this->belongsTo(Rute::class, 'id_rute');
    }

    public function petugas(): BelongsTo {
        return $this->belongsTo(petugas::class, 'id_petugas');
    }

    public function transportasi(): BelongsTo
    {
        return $this->belongsTo(Transportasi::class, 'id_transportasi');
    }

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}
