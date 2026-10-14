<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KontraktorPelaksana extends Model
{
    use HasFactory;

    protected $table = 'kontraktor_pelaksana';

    protected $fillable = [
        'nama',
        'foto',
    ];

    public function laporanHarian(): HasMany
    {
        return $this->hasMany(LapHarian::class, 'kontraktor_pelaksana_id');
    }
}
