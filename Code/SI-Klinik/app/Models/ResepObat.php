<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepObat extends Model
{
    use HasFactory;
    protected $fillable = [
        'pasien_id',
        'user_id',
        'rekam_medis_id',
        'obat_id',
        'jumlah'
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function rekamMedis()
    {
        return $this->belongsTo(RekamMedis::class, 'rekam_medis_id');
    }

    /**
     * Relasi ke model Obat
     */
    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id');
    }
}
