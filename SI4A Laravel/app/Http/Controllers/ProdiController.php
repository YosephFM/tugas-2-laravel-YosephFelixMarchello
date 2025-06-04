<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodi = Prodi::all(); // perintah sql select * from prodi
        //dd($prodi); // dump and die
        return view('prodi.index')->with('prodi', $prodi);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fakultas =
        Fakultas::all();
        
        return view('prodi.create',compact('fakultas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //validasi input
        $input = $request->validate([
            'nama'  => 'required|unique:prodi',
            'singkatan' => 'required |max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);
        // simpan data ke tabel fakultas
        Prodi::create($input);
        // redirect ke fakultas.index
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prodi $prodi)
    {
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prodi $prodi)
    {
        //dd($prodi);
        
        $fakultas = Fakultas::all();
        return view('prodi.edit', compact('prodi', 'fakultas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prodi $prodi)
    {
        $input = $request->validate([
            'nama'  => 'required',
            'singkatan' => 'required |max:5',
            'kaprodi' => 'required',
            'sekretaris' => 'required',
            'fakultas_id' => 'required',
        ]);
        $prodi->update($input);

        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prodi $prodi)
    {
        // hapus data prodi
        $prodi->delete();
        // redirect ke route prodi.index
        return redirect()->route('prodi.index')->with('success', 'Program Studi berhasil dihapus');
    }
}
