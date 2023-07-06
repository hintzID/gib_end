<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Stok::query();

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->whereYear('tanggal', '=', $search)
                    ->orWhereMonth('tanggal', '=', $search);
            });
        }

        $query->orderBy('tanggal', 'asc'); // Mengurutkan berdasarkan tanggal terkecil ke terbesar

        $stok = $query->paginate(10);

        return view('sistem_donasi.stok.index', compact('stok','search'));
    }





    public function create()
    {
        return view('sistem_donasi.stok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'dana_masuk' => 'nullable',
            'harga_beras' => 'nullable',
        ]);

        Stok::create($request->all());

        return redirect()->route('stok.index')
            ->with('success', 'Data stok berhasil ditambahkan.');
    }

    public function edit(Stok $stok)
    {
        return view('sistem_donasi.stok.edit', compact('stok'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'tanggal' => 'required',
            'dana_masuk' => 'nullable',
            'harga_beras' => 'nullable',
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')
            ->with('success', 'Data stok berhasil diperbarui.');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();

        return redirect()->route('stok.index')
            ->with('success', 'Data stok berhasil dihapus.');
    }
}
