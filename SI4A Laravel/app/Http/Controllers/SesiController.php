<?php

namespace App\Http\Controllers;

use App\Models\sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sesi= sesi::all();
        //dd($sesi);
        return view('sesi.index', compact('sesi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sesi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'nama' => 'required|unique:sesi',
        ]);
        // Simpan data ke tabel sesi
        sesi::create($input);
        // Redirect ke sesi.index
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(sesi $sesi)
    {
        
        //dd($sesi);
        return view('sesi.show', compact('sesi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(sesi $sesi)
    {
        
        return view('sesi.edit', compact('sesi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,sesi $sesi)
    {
        
    
        $input = $request->validate([
            'nama' => 'required'
        ]);
        $sesi->update($input);
        
        // Redirect ke sesi.index
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(sesi $sesi)
    {
        // Hapus data dari tabel sesi
        $sesi->delete();
        // Redirect ke sesi.index
        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil dihapus');
    }
}
