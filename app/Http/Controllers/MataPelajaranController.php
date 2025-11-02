<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule; // <-- PENTING

class MataPelajaranController extends Controller
{
    
    public function index()
    {
        $mapel = MataPelajaran::latest()->paginate(10);
        return view('mata_pelajaran.index', compact('mapel'));
    }

    
    public function create()
    {
        return view('mata_pelajaran.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'kode_pelajaran' => 'required|string|unique:mata_pelajarans|max:20',
            'nama_pelajaran' => 'required|string|max:255',
        ]);

        MataPelajaran::create($request->all());

        return redirect()->route('mata-pelajaran.index')
                        ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    
    public function show(MataPelajaran $mataPelajaran)
    {
        // Tidak kita gunakan, bisa dikosongkan
    }

    
    public function edit(MataPelajaran $mataPelajaran)
    {
        // Laravel otomatis mengambil data berdasarkan ID
        return view('mata_pelajaran.edit', [
            'mapel' => $mataPelajaran
        ]);
    }

    
    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $request->validate([
            'kode_pelajaran' => [
                'required',
                'string',
                'max:20',
                Rule::unique('mata_pelajarans')->ignore($mataPelajaran->id),
            ],
            'nama_pelajaran' => 'required|string|max:255',
        ]);

        $mataPelajaran->update($request->all());

        return redirect()->route('mata-pelajaran.index')
                        ->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    
    public function destroy(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();

        return redirect()->route('mata-pelajaran.index')
                         ->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}