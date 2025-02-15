<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'usia',
        'berat_badan',
        'tinggi_badan',
        'status',
        'jadwal_id',
        'balita_id',
    ];

    public function jadwal(): BelongsTo
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }

    public function balita(): BelongsTo
    {
        return $this->belongsTo(Balita::class, 'balita_id', 'id');
    }

    public function hasilFuzzy(): BelongsTo
    {
        return $this->belongsTo(HasilFuzzy::class, 'id', 'pemeriksaan_id');
    }
}
