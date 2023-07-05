<?php

namespace App\Http\Controllers;

use App\Models\Peran;
use Illuminate\Http\Request;


class PeranController extends Controller
{
    public function index()
    {
        $peran = Peran::all();

        return view('sistem_user.peran.index', compact('peran'));
    }

    public function create()
    {
        return view('sistem_user.peran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'peran' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Peran::create($request->all());

        return redirect()->route('peran.index')
            ->with('success', 'Peran berhasil ditambahkan.'); 
    }

    public function show($id)
    {
        $peran = Peran::findOrFail($id);

        return view('sistem_user.peran.show', compact('peran'));
    }

    public function edit($id)
    {
        $peran = Peran::findOrFail($id);

        return view('sistem_user.peran.edit', compact('peran'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'peran' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $peran = Peran::findOrFail($id);
        $peran->update($request->all());

        return redirect()->route('peran.index')
            ->with('success', 'Peran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peran = Peran::findOrFail($id);
        $peran->delete();

        return redirect()->route('peran.index')
            ->with('success', 'Peran berhasil dihapus.');
    }
}
