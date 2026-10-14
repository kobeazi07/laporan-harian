<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class LapHarian extends Model
{
    use HasFactory;

    protected $table = 'lap_harian';

    protected $fillable = [
        'judul',
        'keterangan',
        'instruksi_catatan',
        'created_by',
        'nomor',
        'tanggal',
        'approved_by',
        'konsultan_pengawas_id',
        'owner_id',
        'kontraktor_pelaksana_id',
        'sisa_waktu',
    ];

    protected function casts(): array
    {
        return [
            'tanggal' => 'date',
            'sisa_waktu' => 'integer',
        ];
    }

    public function pembuat(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function penyetuju(): BelongsTo
    {
        return $this->belongsTo(User::class, 'approved_by');
    }

    public function konsultanPengawas(): BelongsTo
    {
        return $this->belongsTo(KonsultanPengawas::class, 'konsultan_pengawas_id');
    }

    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }

    public function kontraktorPelaksana(): BelongsTo
    {
        return $this->belongsTo(KontraktorPelaksana::class, 'kontraktor_pelaksana_id');
    }

    public function keteranganOptional(): HasMany
    {
        return $this->hasMany(KeteranganOptional::class, 'lap_harian_id');
    }

    public function tenagaKerjaInputs(): HasMany
    {
        return $this->hasMany(TenagaKerjaInput::class, 'lap_harian_id');
    }

    public function alatInputs(): HasMany
    {
        return $this->hasMany(AlatInput::class, 'lap_harian_id');
    }

    public function materialInputs(): HasMany
    {
        return $this->hasMany(MaterialInput::class, 'lap_harian_id');
    }

    public function cuaca(): HasOne
    {
        return $this->hasOne(Cuaca::class, 'lap_harian_id');
    }

    public function dokumentasi(): HasMany
    {
        return $this->hasMany(Dokumentasi::class, 'lap_harian_id');
    }
}
