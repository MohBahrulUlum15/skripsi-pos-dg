<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Balita extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tanggal_lahir',
        'jenis_kelamin',
        'bb_lahir',
        'tb_lahir',
        'orangtua_id',
        'posyandu_id',
    ];

    public function orangtua(): BelongsTo
    {
        return $this->belongsTo(OrangTua::class);
    }

    public function posyandu(): BelongsTo
    {
        return $this->belongsTo(Posyandu::class);
    }
}
