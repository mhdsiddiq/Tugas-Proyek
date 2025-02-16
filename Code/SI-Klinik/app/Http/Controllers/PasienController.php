<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Manajemen Data Pasien',
            'pasien' => Pasien::paginate(10),
            'content' => 'pasien/index'
        ];

        return view('layouts.main', $data);
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'name' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'required|string|max:500',
            'no_bpjs' => 'nullable|numeric',
        ]);

        // Simpan data ke database
        $pasien = new Pasien();
        $pasien->name = $request->name;
        $pasien->tanggal_lahir = $request->tanggal_lahir;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->alamat = $request->alamat;
        $pasien->no_bpjs = $request->no_bpjs;
        $pasien->save();

        // Redirect atau respon JSON
        return response()->json(
            [
                'message' => 'Data pasien berhasil disimpan.',
                'data' => $pasien,
            ],
            201
        );
    }

    public function edit($id)
    {
        $pasien = Pasien::findOrFail($id);
        return view('pasien.edit', compact('pasien'));
    }

    public function update(Request $request, $id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate'
        ]);
    }

    public function destroy($id)
    {
        $pasien = Pasien::findOrFail($id);
        $pasien->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil dihapus'
        ]);
    }
}
