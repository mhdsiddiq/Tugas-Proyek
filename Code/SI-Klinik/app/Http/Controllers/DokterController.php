<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Pasien;
use App\Models\Reservasi;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DokterController extends Controller
{
    public function index()
    {
        $dokter = User::where('role_id', 3)->get();
        return view('layouts.main', [
            'title' => 'Manajemen Dokter',
            'dokter' => $dokter,
            'content' => 'dokter/index'
        ]);
    }

    public function create()
    {
        $roles = Role::all(); // Ambil semua role
        $defaultRole = Role::where('name', 'Dokter')->first(); // Cari role "Dokter"
        return view('dokter.create', [
            'roles' => $roles,
            'defaultRole' => $defaultRole,
        ]);
    }

    public function store(Request $request)
    {
        $request->merge(['role_id' => 3]);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|string',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id, // Ambil role_id dari request
        ]);

        return response()->json(['success' => true, 'message' => 'Data dokter berhasil ditambahkan.']);
    }

    public function edit($id)
    {
        $dokter = User::findOrFail($id);
        return view('dokter.edit', compact('dokter'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $dokter = User::findOrFail($id);
        $dokter->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $dokter->password,
        ]);

        return response()->json(['success' => true, 'message' => 'Data dokter berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        $dokter = User::findOrFail($id);
        $dokter->delete();

        return response()->json(['success' => true, 'message' => 'Data dokter berhasil dihapus.']);
    }

    public function inputRekamMedis($id)
    {
        // Cari reservasi berdasarkan id
        $reservasi = Reservasi::with(['pasien', 'dokter', 'rekamMedis'])->findOrFail($id);

        // Dapatkan diagnosis terdahulu berdasarkan pasien_id dari reservasi
        $diagnosisTerdahulu = RekamMedis::where('pasien_id', $reservasi->pasien_id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('layouts.main', [
            'title' => 'Periksa Pasien',
            'reservasi' => $reservasi,
            'pasien' => $reservasi->pasien,  // Relasi otomatis di-load
            'dokter' => $reservasi->dokter,  // Relasi otomatis di-load
            'diagnosisTerdahulu' => $diagnosisTerdahulu,
            'content' => 'dokter/input_rekam_medis'
        ]);
    }
}
