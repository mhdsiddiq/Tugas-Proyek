<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\ResepObat;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class ResepObatController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Resep Obat',
            'resep_obat' => ResepObat::all(),
            'content' => 'dokter/index_resep_obat'
        ];
        return view('layouts.main', $data);
    }
    // Menampilkan form pembuatan resep obat untuk rekam medis tertentu
    public function create($id)
    {
        // Cari data rekam medis terkait
        $rekamMedis = RekamMedis::findOrFail($id);

        // Ambil daftar obat untuk ditampilkan di dropdown/select
        $obats = Obat::all();

        return view('dokter.create_resep_obat', compact('rekamMedis', 'obats'));
        // Buat view resources/views/resep/create.blade.php
    }

    // Menyimpan data resep obat
    public function store(Request $request)
    {
        // Validasi data yang dikirim dari form resep
        $request->validate([
            'rekam_medis_id' => 'required|exists:rekam_medis,id',
            'pasien_id'      => 'required|exists:pasiens,id',       // Pastikan tabel pasien ada
            'user_id'        => 'required|exists:users,id',         // ID dokter (user) yang membuat resep
            'obat_id'        => 'required|exists:obats,id',
            'jumlah'         => 'required|integer|min:1'
        ]);

        $obat = Obat::find($request->obat_id);

        // Periksa apakah stok cukup
        if ($obat->jumlah < $request->jumlah) {
            return response()->json([
                'success' => false,
                'message' => 'Stok obat tidak mencukupi.'
            ], 400);
        }

        // Kurangi stok obat
        $obat->jumlah -= $request->jumlah;
        $obat->save();

        // Simpan data resep obat
        ResepObat::create([
            'rekam_medis_id' => $request->rekam_medis_id,
            'obat_id'        => $request->obat_id,
            'jumlah'         => $request->jumlah,
            'user_id'        => $request->user_id,
            'pasien_id'      => $request->pasien_id
        ]);



        return response()->json([
            'success' => true,
            'message' => 'Resep obat berhasil dibuat.'
        ]);
    }
}
