<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Bidan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'nip',
        'tanggal_lahir',
        'alamat',
        'phone',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posyandus(): BelongsToMany
    {
        return $this->belongsToMany(Posyandu::class, 'posyandu_bidan');
    }
}
