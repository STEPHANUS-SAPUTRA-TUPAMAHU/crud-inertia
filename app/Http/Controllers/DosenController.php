<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Http\Requests\StoreDosenRequest;
use App\Http\Requests\UpdateDosenRequest;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosen = Dosen::select('id', 'nip', 'nama', 'fakultas', 'prodi', 'email', 'alamat', 'no_telepon')
            ->latest()
            ->get();

        return inertia('Dosen/Index', [
            'dosen' => $dosen,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //fungsi untuk menampilkan halaman tambah
    {
        return inertia('Dosen/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDosenRequest $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'nip'         => 'required|string|max:30|unique:dosens,nip',
            'email'       => 'required|email|unique:dosens,email',
            'fakultas'    => 'required|string|max:100',
            'prodi'       => 'required|string|max:100',
            'alamat'      => 'required|string',
            'no_telepon'  => 'required|string|max:20',
        ]);
        Dosen::create($validated);

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data dosen berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dosen $dosen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dosen $dosen)
    {
        return inertia('Dosen/Edit', [
            'dosen' => $dosen,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDosenRequest $request, Dosen $dosen)
    {
        $dosen->update($request->validated());

        return redirect()
            ->route('dosen.index')
            ->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dosen $dosen)
    {
        try {
            $dosen->delete();

            return redirect()
                ->route('dosen.index')
                ->with('success', 'Data dosen berhasil di hapus');
        } catch (\Throwable $e) {
            return redirect()
                ->back()
                ->with('error', 'Data dosen gagal dihapus');
        }
    }
}
