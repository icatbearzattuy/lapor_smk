<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Laporan = Laporan::all();
        return view('dashboard');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul_laporan' => 'required|string|max:50',
            'isi_laporan' => 'required|string',
            'tanggal_laporan' => 'required|date',
            'image' => 'required|image|max:4096',
            'id_kategori' => 'required|integer|exists:tbl_kategori, id_kategori',
        ]);

        Laporan::create([
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'tanggal_laporan' => $request->tanggal_laporan,
            'image' => $request->image,
            'id_kategori' => $request->id_kategori,
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
