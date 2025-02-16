<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservasi_id',
        'user_id',
        'pasien_id',
        'tanggal',
        'diagnosis',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
