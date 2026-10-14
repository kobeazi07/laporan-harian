<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TenagaKerja extends Model
{
    use HasFactory;

    protected $table = 'tenaga_kerja';

    protected $fillable = [
        'jabatan',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'integer',
        ];
    }

    public function inputs(): HasMany
    {
        return $this->hasMany(TenagaKerjaInput::class, 'tenaga_kerja_id');
    }
}
