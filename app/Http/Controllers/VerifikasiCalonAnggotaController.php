<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\VerifikasiCalonAnggota;
use App\Models\CalonAnggota;
use Illuminate\Http\Request;

class VerifikasiCalonAnggotaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $verifikasiAnggota = VerifikasiCalonAnggota::with('calonAnggota')
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('calonAnggota', function ($query) use ($keyword) {
                    $query->where('nama_lengkap', 'like', "%$keyword%");
                });
            })
            ->whereDoesntHave('Anggota')
            ->orderByDesc('created_at')
            ->paginate(10);

        return view('sistem_anggota.verifikasi-calon-anggota.index', compact('verifikasiAnggota', 'keyword'));
    }

public function create()
{
    $calonAnggota = CalonAnggota::doesntHave('verifikasiCalonAnggota')->get();

    return view('sistem_anggota.verifikasi-calon-anggota.create', compact('calonAnggota'));
}


public function store(Request $request)
{
    $validatedData = $request->validate([
        'calon_anggota_id' => 'required|exists:calon_anggota,id|unique:verifikasi_calon_anggota,calon_anggota_id',
        'verifikasi' => 'required',
        'catatan' => 'nullable',
    ]);

    VerifikasiCalonAnggota::create($validatedData);

    return redirect()->route('verifikasi-calon-anggota.index')
        ->with('success', 'Verifikasi anggota berhasil ditambahkan.');
}


public function edit($id)
{
    $verifikasiAnggota = VerifikasiCalonAnggota::findOrFail($id);
    $calonAnggota = CalonAnggota::pluck('nama_lengkap', 'id');

    return view('sistem_anggota.verifikasi-calon-anggota.edit', compact('verifikasiAnggota', 'calonAnggota'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'calon_anggota_id' => 'required',
            'verifikasi' => 'required',
            'catatan' => 'nullable',
        ]);

        $verifikasiAnggota = VerifikasiCalonAnggota::findOrFail($id);
        $verifikasiAnggota->update($request->only(['calon_anggota_id', 'verifikasi', 'catatan']));

        return redirect()->route('verifikasi-calon-anggota.index')
            ->with('success', 'Verifikasi anggota berhasil diperbarui.');
    }

    public function show($id)
    {
        $verifikasiAnggota = VerifikasiCalonAnggota::findOrFail($id);
        return view('sistem_anggota.verifikasi-calon-anggota.show', compact('verifikasiAnggota'));
    }

    public function destroy($id)
    {
        VerifikasiCalonAnggota::findOrFail($id)->delete();

        return redirect()->route('verifikasi-calon-anggota.index')
            ->with('success', 'Calon anggota berhasil dihapus.');
    }
}
