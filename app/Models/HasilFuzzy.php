<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HasilFuzzy extends Model
{
    use HasFactory;

    protected $fillable = [
        'pemeriksaan_id',
        'status_gizi_bb_u',
        'deff_val_bb_u',
        'status_degree_bb_u',
        'status_gizi_tb_u',
        'deff_val_tb_u',
        'status_degree_tb_u',
        'status_gizi_bb_tb',
        'deff_val_bb_tb',
        'status_degree_bb_tb',
    ];

    public function pemeriksaan(): BelongsTo
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
    }
}
