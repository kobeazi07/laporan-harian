<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Project extends Model
{
    protected $table = 'project';

    protected $fillable = [
        'nama_project',
        'kode_project',
        'konsultan_pengawas_id',
        'owner_id',
        'kontraktor_pelaksana_id',
    ];

    public function konsultanPengawas(): BelongsTo
    {
        return $this->belongsTo(
            KonsultanPengawas::class,
            'konsultan_pengawas_id'
        );
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function kontraktorPelaksana(): BelongsTo
    {
        return $this->belongsTo(
            KontraktorPelaksana::class,
            'kontraktor_pelaksana_id'
        );
    }

    public function laporanHarian(): HasMany
    {
        return $this->hasMany(LapHarian::class, 'project_id');
    }
}
