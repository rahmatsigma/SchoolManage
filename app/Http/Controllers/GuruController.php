<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Guru::query();

        if ($search) {
            $query->where('nama_lengkap', 'like', "%{$search}%")
                ->orWhere('nip', 'like', "%{$search}%")
                ->orWhere('jabatan', 'like', "%{$search}%");
        }

        $gurus = $query->latest()->paginate(10);

        return view('guru.index', compact('gurus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'guru')->get();
        return view('guru.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:gurus,nip',
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'nomor_telepon' => 'nullable',
            'alamat' => 'nullable',
            'user_id' => 'nullable|exists:users,id',
        ]);

        Guru::create($request->all());

        return redirect()->route('guru.index')
                        ->with('success', 'Guru created successfully.');
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
    public function edit(Guru $guru) 
    {
        return view('guru.edit', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => [
                'required',
                'string',
                'max:20',
                Rule::unique('gurus')->ignore($guru->id), 
            ],
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string|max:100',
            'nomor_telepon' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')
                        ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru->delete();

    return redirect()->route('guru.index')
                    ->with('success', 'Data guru berhasil dihapus.');
    }
}
