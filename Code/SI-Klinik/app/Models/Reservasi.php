<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id',
        'dokter_id',
        'tanggal_reservasi',
        'keluhan',
        'no_bpjs',
        'status'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(User::class);
    }

    public function rekamMedis()
    {
        // return $this->hasOne(RekamMedis::class, 'reservasi_id'); // Sesuaikan foreign key
        // return $this->hasMany(RekamMedis::class, 'pasien_id', 'pasien_id');
        return $this->hasOne(RekamMedis::class, 'reservasi_id', 'id');
    }
}
