<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Alat extends Model
{
    use HasFactory;

    protected $table = 'alat';

    protected $fillable = [
        'nama',
        'foto',
    ];

    public function inputs(): HasMany
    {
        return $this->hasMany(AlatInput::class, 'alat_id');
    }
}
