<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrangTua extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nik',
        'tanggal_lahir',
        'alamat',
    ];

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function balita(): HasMany {
        return $this->hasMany(Balita::class);
    }
}
