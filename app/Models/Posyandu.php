<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Posyandu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat',
        'bidan_id'
    ];

    public function balita(): HasMany{
        return $this->hasMany(Balita::class);
    }

    public function bidans(): BelongsToMany{
        return $this->belongsToMany(Bidan::class, 'posyandu_bidan');
    }

    public function jadwal(): HasMany{
        return $this->hasMany(Jadwal::class);
    }
}
