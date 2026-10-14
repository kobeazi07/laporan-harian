<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material';

    protected $fillable = [
        'nama',
        'foto',
    ];

    public function inputs(): HasMany
    {
        return $this->hasMany(MaterialInput::class, 'material_id');
    }
}
