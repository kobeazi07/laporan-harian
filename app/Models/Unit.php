<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    protected $table = 'unit';

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function alatInputs(): HasMany
    {
        return $this->hasMany(AlatInput::class, 'unit_id');
    }

    public function materialInputs(): HasMany
    {
        return $this->hasMany(MaterialInput::class, 'unit_id');
    }
}
