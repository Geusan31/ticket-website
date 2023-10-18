<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id_pembayaran'];
    public $timestamps = false;
    protected $primaryKey = 'id_pembayaran';
    protected $table = 'pembayarans';

    public function penumpang()
    {
        return $this->hasMany(Penumpang::class, 'id_penumpang');
    }

    public function pemesanan()
    {
        return $this->hasMany(Pemesanan::class, 'id_pemesanan');
    }
}
