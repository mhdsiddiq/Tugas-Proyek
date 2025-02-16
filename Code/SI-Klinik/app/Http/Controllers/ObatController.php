<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    // Get All Obat
    // public function index()
    // {
    //     $data = [
    //         'title' => 'Manajemen Data Obat',
    //         'obat' => Obat::paginate(10),
    //         'content' => 'obat/index'
    //     ];

    //     return view('layouts.main', $data);
    // }
    public function index()
    {
        $obat = Obat::latest()->get();
        return view('layouts.main', [
            'title' => 'Manajemen Obat',
            'obat' => $obat,
            'content' => 'obat/index'
        ]);
    }

    // Menampilkan form create (untuk modal)
    public function create()
    {
        return view('obat.create');
    }

    // Menyimpan data baru (AJAX)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date',
            'tanggal_expire' => 'required|date|after:tanggal_masuk',
            'satuan' => 'required|string|max:50',
            'jumlah' => 'required|integer|min:1'
        ]);

        Obat::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil ditambahkan!'
        ]);
    }

    // Menampilkan form edit (untuk modal)
    public function edit($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.edit', compact('obat'));
    }

    // Update data (AJAX)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'sometimes|string|max:100',
            'tanggal_masuk' => 'sometimes|date',
            'tanggal_expire' => 'sometimes|date|after:tanggal_masuk',
            'satuan' => 'sometimes|string|max:50',
            'jumlah' => 'sometimes|integer|min:1'
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil diperbarui!'
        ]);
    }

    // Hapus data (AJAX)
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);
        $obat->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data obat berhasil dihapus!'
        ]);
    }
}
