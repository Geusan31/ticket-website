<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    protected $guarded = ['id_level'];
    protected $table = 'levels';
    public $timestamps = false;

    public function petugas(): HasMany
    {
        return $this->hasMany(Petugas::class);
    }
}
