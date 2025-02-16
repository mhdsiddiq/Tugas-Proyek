<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'tanggal_masuk',
        'tanggal_expire',
        'satuan',
        'jumlah'
    ];

    protected $casts = [
        'tanggal_masuk' => 'date:Y-m-d',
        'tanggal_expire' => 'date:Y-m-d'
    ];
}
