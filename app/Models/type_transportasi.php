<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Type_transportasi extends Model
{
    use HasFactory;
    protected $guarded = ['id_type_transportasi'];
    public $timestamps = false;
    protected $primaryKey = 'id_type_transportasi';
    protected $table = 'type_transportasis';

    public function rute(): HasMany {
        return $this->hasMany(Rute::class, 'id_rute');
    }

    public function transportasi(): HasMany {
        return $this->hasMany(Rute::class, 'id_transportasi');
    }
}
