<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = mahasiswa::all();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim'=>'required|unique:mahasiswa',
            'nama'=>'required',
            'nama'=>'required',
            'nama'=>'required',
            'nama'=>'required',
        ]);

        mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $mahasiswa = mahasiswa::findOrFail($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim'=>'required|unique:mahasiswa,nim,' . $id,
            'nama'=>'required',
            'jurusan'=>'required',
            'kampus'=>'required',
        ]);

        $mahasiswa = mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index');
    }

    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->forceDelete(); // Menghapus data mahasiswa
        return redirect()->route('mahasiswa.index'); // Redirect ke halaman daftar mahasiswa
    }
}
