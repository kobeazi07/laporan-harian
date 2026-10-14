<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cuaca extends Model
{
    use HasFactory;

    protected $table = 'cuaca';

    protected $fillable = [
        'lap_harian_id',
        'pagi',
        'siang',
        'sore',
        'malam',
    ];

    public function lapHarian(): BelongsTo
    {
        return $this->belongsTo(LapHarian::class, 'lap_harian_id');
    }
}
