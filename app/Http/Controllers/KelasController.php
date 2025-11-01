<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\Kelas;
use Illuminate\Http\Request;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::latest()->paginate(10);
        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'nama_kelas' => 'required|string|unique:kelas|max:255',
            'tingkat' => 'required|string|max:10',
        ]);

        // Simpan ke database (pastikan Model Kelas sudah punya $fillable)
        Kelas::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kelas.index')
                        ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela) // Variabel $kela otomatis diisi Laravel
    {
        return view('kelas.edit', [
            'kelas' => $kela
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'nama_kelas' => [
                'required',
                'string',
                'max:255',
                Rule::unique('kelas')->ignore($kela->id), // Abaikan ID saat ini
            ],
            'tingkat' => 'required|string|max:10',
        ]);

        $kela->update($request->all());

        return redirect()->route('kelas.index')
                        ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect()->route('kelas.index')
                        ->with('success', 'Data kelas berhasil dihapus.');
    }
}
