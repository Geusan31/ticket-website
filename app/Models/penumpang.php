<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class penumpang extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id_penumpang'];
    protected $table = 'penumpangs';

    public function pemesanan(): HasMany
    {
        return $this->hasMany(pemesanan::class);
    }
}
