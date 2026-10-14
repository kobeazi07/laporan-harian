<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TenagaKerjaInput extends Model
{
    use HasFactory;

    protected $table = 'tenaga_kerja_input';

    protected $fillable = [
        'lap_harian_id',
        'tenaga_kerja_id',
        'jumlah',
    ];

    protected function casts(): array
    {
        return [
            'jumlah' => 'integer',
        ];
    }

    public function lapHarian(): BelongsTo
    {
        return $this->belongsTo(LapHarian::class, 'lap_harian_id');
    }

    public function tenagaKerja(): BelongsTo
    {
        return $this->belongsTo(TenagaKerja::class, 'tenaga_kerja_id');
    }
}
