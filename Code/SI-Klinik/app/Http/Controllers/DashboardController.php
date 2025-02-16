<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pasien;
use App\Models\Reservasi;


class DashboardController extends Controller
{
    public function index()
    {
        // return view('admin.dashboard');


        $data = [
            'title' => 'Dashboard',
            'pasien' => Pasien::all(),
            'obat' => Obat::all(),
            'reservasi' => Reservasi::whereDoesntHave('rekamMedis')->with('pasien')->get(),
            'content' => 'admin/dashboard'
        ];
        return view('layouts.main', $data);
    }
}
