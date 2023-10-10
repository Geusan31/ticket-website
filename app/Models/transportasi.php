<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transportasi extends Model
{
    use HasFactory;
    protected $guarded = ['id_transportasi'];
    public $timestamps = false;
    protected $primaryKey = 'id_transportasi';
    protected $table = 'transportasis';

    public function rute(): HasMany
    {
        return $this->hasMany(Rute::class);
    }

    public function type_transportasi(): BelongsTo
    {
        return $this->belongsTo(Type_transportasi::class, 'id_type_transportasi');
    }
}
