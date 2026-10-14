<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owner';

    protected $fillable = [
        'nama',
        'foto',
    ];

    public function laporanHarian(): HasMany
    {
        return $this->hasMany(LapHarian::class, 'owner_id');
    }
}
