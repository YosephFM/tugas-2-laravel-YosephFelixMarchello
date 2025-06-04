<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Mata_kuliah;
use App\Models\Sesi;
use App\Models\User; // Assuming you have a User model for dosen
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::all();
        //dd($jadwal); // Uncomment this line to debug and see the jadwal data
        return view('jadwal.index', compact('jadwal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_kuliah = Mata_kuliah::all();
        $dosen = User::all(); // Assuming 'dosen' is a role in your User model
        $sesi = Sesi::all();
        return view('jadwal.create', compact('mata_kuliah', 'dosen', 'sesi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required',
            'kode_smt' => 'required',
            'kelas' => 'required',
            'mata_kuliah_id' => 'required |exists:mata_kuliah,id',
            'dosen_id' => 'required| exists:users,id', // Assuming 'users' is the table for dosen
            'sesi_id' => 'required |exists:sesi,id',
        ]);
        Jadwal::create($input);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        return view('jadwal.show', compact('jadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        $mata_kuliah = Mata_kuliah::all();
        $dosen = User::all(); // Assuming 'dosen' is a role in your User model
        $sesi = Sesi::all();
        return view('jadwal.edit', compact('jadwal', 'mata_kuliah', 'dosen', 'sesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $input = $request->validate([
            'tahun_akademik' => 'required|max:10',
            'kode_smt' => 'required|max:20',
            'kelas' => 'required|max:10',
            'mata_kuliah_id' => 'required',
            'dosen_id' => 'required',
            'sesi_id' => 'required',
        ]);
        $jadwal->update($input);
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
    }
}
