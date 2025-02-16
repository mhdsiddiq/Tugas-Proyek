<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'tanggal_lahir', 'jekel', 'alamat', 'no_bpjs'];

    public function reservasis()
    {
        return $this->hasMany(Reservasi::class);
    }
}
