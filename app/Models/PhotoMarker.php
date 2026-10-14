<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PhotoMarker extends Model
{
    use HasFactory;

    protected $table = 'photo_marker';

    protected $fillable = [
        'dokumentasi_id',
        'jam',
        'tanggal',
        'hari',
        'location',
        'judul_dokumentasi',
    ];

    protected function casts(): array
    {
        return [
            'jam' => 'datetime:H:i:s',
            'tanggal' => 'date',
        ];
    }

    public function dokumentasi(): BelongsTo
    {
        return $this->belongsTo(Dokumentasi::class, 'dokumentasi_id');
    }
}
