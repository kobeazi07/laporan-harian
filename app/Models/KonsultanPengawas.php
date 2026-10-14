<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KonsultanPengawas extends Model
{
    use HasFactory;

    protected $table = 'konsultan_pengawas';

    protected $fillable = [
        'nama',
        'foto',
    ];

    public function laporanHarian(): HasMany
    {
        return $this->hasMany(LapHarian::class, 'konsultan_pengawas_id');
    }
}
