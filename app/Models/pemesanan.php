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

    public function penumpang(): BelongsTo
    {
        return $this->belongsTo(Penumpang::class);
    }

    public function rute(): BelongsTo {
        return $this->belongsTo(Rute::class);
    }
}
