<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Balita extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tanggal_lahir',
        'jenis_kelamin',
        'bb_lahir',
        'tb_lahir',
        'orang_tua_id',
        'posyandu_id',
    ];

    public function orangtua(): BelongsTo
    {
        return $this->belongsTo(OrangTua::class, 'orang_tua_id', 'id');
    }

    public function posyandu(): BelongsTo
    {
        return $this->belongsTo(Posyandu::class, 'posyandu_id', 'id');
    }

    public function pemeriksaan(): HasMany
    {
        return $this->hasMany(Pemeriksaan::class);
    }
}
