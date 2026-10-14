<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class KeteranganOptional extends Model
{
    use HasFactory;

    protected $table = 'keterangan_optional';

    protected $fillable = [
        'lap_harian_id',
        'remark',
    ];

    public function lapHarian(): BelongsTo
    {
        return $this->belongsTo(LapHarian::class, 'lap_harian_id');
    }
}
