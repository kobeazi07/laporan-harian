<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SowInput extends Model
{
    protected $table = 'sow_inputs';

    protected $fillable = [
        'lap_harian_id',
        'sow_id',
    ];

    public function lapHarian(): BelongsTo
    {
        return $this->belongsTo(LapHarian::class, 'lap_harian_id');
    }

    public function scopeWork(): BelongsTo
    {
        return $this->belongsTo(ScopeWork::class, 'sow_id');
    }
}
