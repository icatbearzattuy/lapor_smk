<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $siswa = User::where('role', 'user')
            ->orderBy('id_user', 'desc')
            ->get();

        return view('admin.siswa', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.siswa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:30',
            'password' => 'required|max:10',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'user',
            'email_verified_at' => now(),
        ]);

        return redirect()->route('admin.siswa')->with('success', 'Siswa berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        return view('admin.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'password' => 'nullable|min:6'
        ]);

        $siswa->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $siswa->update(['password' => bcrypt($request->password)]);
        };

        return redirect()->route('admin.siswa')
            ->with('Success', 'Siswa berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $siswa = User::where('id_user', $id)
            ->firstOrFail();

        $siswa->delete();
        return redirect()->route('admin.siswa')
            ->with('Success', 'Siswa berhasil di Delete');
    }
}
