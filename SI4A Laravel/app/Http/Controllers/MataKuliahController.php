<?php

namespace App\Http\Controllers;

use App\Models\Mata_kuliah;
use App\Models\prodi;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliah = Mata_kuliah::all(); // perintah sql select * from mata_kuliah
        //dd($mata_kuliah); // dump and die
        return view('mata_kuliah.index', compact('mata_kuliah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = prodi::all(); // mengambil data prodi untuk dropdown
        return view('mata_kuliah.create', compact('prodi'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validasi input
        $input = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);
        
        // simpan data ke tabel mata_kuliah
        Mata_kuliah::create($input);
        
        // redirect ke route mata_kuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mata_kuliah $mata_kuliah)
    {
        return view('mata_kuliah.show', compact('mata_kuliah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mata_kuliah $mata_kuliah)
    {
        $prodi = Prodi::all();
        return view('mata_kuliah.edit', compact('mata_kuliah', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mata_kuliah $mata_kuliah)
    {
        $input = $request->validate([
            'kode_mk' => 'required|unique:mata_kuliah,kode_mk,',
            'nama' => 'required',
            'prodi_id' => 'required',
        ]);
        $mata_kuliah->update($input);
        // redirect ke route mata_kuliah.index  
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mata_kuliah $mata_kuliah)
    {
        // hapus data mata_kuliah
        $mata_kuliah->delete();
        
        // redirect ke route mata_kuliah.index
        return redirect()->route('mata_kuliah.index')->with('success', 'Mata Kuliah berhasil dihapus.');
    }
}
