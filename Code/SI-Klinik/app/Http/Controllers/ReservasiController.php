<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pasien;
use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        // $reservasi = Reservasi::all();
        // return view('reservasi.index', compact('reservasi'));
        $reservasi = Reservasi::whereDoesntHave('rekamMedis')->get();
        return view('layouts.main', [
            'title' => 'Manajemen Dokter',
            'reservasi' => $reservasi,
            'content' => 'reservasi/index'
        ]);
    }
    public function create($id)
    {
        $pasien = Pasien::findOrFail($id);
        $dokters = User::where('role_id', 3)->get();
        return view('reservasi.create', compact('pasien', 'dokters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pasien_id' => 'required|exists:pasiens,id',
            'dokter_id' => 'required|exists:users,id',
            'tanggal_reservasi' => 'required|date',
            'keluhan' => 'required|string|max:500'
        ]);

        $pasien = Pasien::findOrFail($request->pasien_id);

        Reservasi::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'tanggal_reservasi' => $request->tanggal_reservasi,
            'keluhan' => $request->keluhan,
            'no_bpjs' => $pasien->no_bpjs, // Ambil dari data pasien
            'status' => 'pending'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Reservasi berhasil dibuat'
        ]);
    }
}
