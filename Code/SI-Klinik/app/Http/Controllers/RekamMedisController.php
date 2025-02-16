<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamMedisController extends Controller
{
    public function index()
    {
        // Data untuk tampilan
        $rekam_medis = RekamMedis::all();
        $data = [
            'title' => 'Rekam Medis',
            'rekam_medis' => $rekam_medis,
            'content' => 'dokter/index_rekam_medis'
        ];
        return view('layouts.main', $data);
    }
    public function simpan(Request $request)
    {
        // Validasi input
        $request->validate([
            'reservasi_id' => 'required|exists:reservasis,id',
            'dokter_id' => 'required|exists:users,id',
            'pasien_id' => 'required|exists:pasiens,id',
            'tanggal' => 'required|date',
            'diagnosis' => 'required|string',
        ]);

        // Simpan data rekam medis
        RekamMedis::create([
            'reservasi_id' => $request->reservasi_id,
            'user_id' => $request->dokter_id,
            'pasien_id' => $request->pasien_id,
            'tanggal' => $request->tanggal,
            'diagnosis' => $request->diagnosis,
        ]);

        // // Hapus data pada tabel reservasi
        // Reservasi::where('id', $request->reservasi_id)->delete();

        // Redirect ke halaman input rekam medis dengan pesan sukses
        // return redirect()->route('input.rekam.medis', ['id' => $request->pasien_id])->with('success', 'Rekam medis berhasil disimpan.');
        return redirect()->route('dashboard-dokter')->with('success', 'Rekam medis berhasil disimpan.');
    }
}
