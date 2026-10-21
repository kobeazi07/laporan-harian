<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TworkInput extends Model
{
    protected $table = 'twork_inputs';

    protected $fillable = [
        'lap_harian_id',
        'type_work_id',
    ];

    public function lapHarian(): BelongsTo
    {
        return $this->belongsTo(LapHarian::class, 'lap_harian_id');
    }

    public function typeWork(): BelongsTo
    {
        return $this->belongsTo(TypeWork::class, 'type_work_id');
    }
}
