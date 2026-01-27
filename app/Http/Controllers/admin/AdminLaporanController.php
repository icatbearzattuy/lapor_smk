<?php

namespace App\Http\Controllers\admin;

use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laporan = Laporan::with(['user', 'kategori'])
            ->orderBy('tanggal_laporan', 'desc')
            ->get();
        return view('admin.dashboard', compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function laporan()
    {
        $laporan = Laporan::with(['user', 'kategori'])
            ->orderBy('tanggal_laporan', 'desc')
            ->get();
        return view('admin.laporan', compact('laporan'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.laporan.tambah', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kategori = Kategori::all();

        $request->validate([
            'judul_laporan' => 'required|string|max:50',
            'isi_laporan' => 'required|string',
            'tanggal_laporan' => 'required|date',
            'image' => 'required|image|max:4096',
            'id_kategori' => 'required|integer|exists:tbl_kategori,id_kategori',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('laporan', $imageName, 'public');
            $imagePath = 'laporan/' . $imageName;
        }

        Laporan::create([
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'tanggal_laporan' => $request->tanggal_laporan,
            'image' => $imagePath,
            'id_user' => Auth::user()->id_user,
            'id_kategori' => $request->id_kategori,
        ]);

        return view('admin.laporan.tambah', compact('kategori'));
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
    public function edit($id)
    {
        $laporan = Laporan::findOrFail($id);
        $kategori = Kategori::all();
        return view('admin.laporan.edit', compact('laporan', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kategori = Kategori::all();
        $laporan = Laporan::where('id_laporan', $id)->firstOrFail();

        $request->validate([
            'judul_laporan' => 'required|string|max:50',
            'isi_laporan' => 'required|string',
            'tanggal_laporan' => 'required|date',
            'image' => 'required|image|max:4096',
            'id_kategori' => 'required|integer|exists:tbl_kategori,id_kategori',
        ]);

        $imagePath = $laporan->image;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('laporan', $imageName, 'public');
            $imagePath = 'laporan/' . $imageName;
        }

        $laporan->update([
            'judul_laporan' => $request->judul_laporan,
            'isi_laporan' => $request->isi_laporan,
            'tanggal_laporan' => $request->tanggal_laporan,
            'image' => $imagePath,
            'id_user' => Auth::user()->id_user,
            'id_kategori' => $request->id_kategori,
        ]);

        return redirect()->route('admin.laporan', compact('kategori'))
            ->with('Success', 'Laporan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $laporan = Laporan::where('id_laporan', $id)->firstOrFail();

        if ($laporan->image && Storage::disk('public')->exists($laporan->image)) {
            Storage::disk('public')->delete($laporan->image);
        }

        $laporan->delete();

        return redirect()->route('admin.laporan')
            ->with('Success', 'Laporan berhasil diubah!');
    }
}
