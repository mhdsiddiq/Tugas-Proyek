<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class DashboardDokterController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'List Pasien',
            'pasien' => Reservasi::whereDoesntHave('rekamMedis')->with('pasien')->get(),
            // 'pasien' => Reservasi::all(),
            'content' => 'dokter/dashboard'
        ];
        return view('layouts.main', $data);
    }
}
