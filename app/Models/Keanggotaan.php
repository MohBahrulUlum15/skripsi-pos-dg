<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Keanggotaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_keanggotaan',
        'nama_fungsi',
        'bb_l',
        'bt_l',
        'ba_l',
        'bb_p',
        'bt_p',
        'ba_p',
        'variabel_id'
    ];

    public function variabel(): BelongsTo
    {
        return $this->belongsTo(Variabel::class);
    }
}
