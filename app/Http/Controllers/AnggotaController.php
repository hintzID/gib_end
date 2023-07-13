<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\VerifikasiCalonAnggota;
use App\Models\CalonAnggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $anggota = Anggota::with('verifikasiCalonAnggota')
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('verifikasiCalonAnggota.calonAnggota', function ($query) use ($keyword) {
                    $query->where('nama_lengkap', 'like', "%$keyword%");
                });
            })
            ->paginate(10);

        return view('sistem_anggota.anggota.index', compact('anggota', 'keyword'));
    }


    public function create()
    {
        $anggota = Anggota::all();
        $verifikasiCalonAnggota = VerifikasiCalonAnggota::doesntHave('anggota')->get();
        return view('sistem_anggota.anggota.create', compact('verifikasiCalonAnggota','anggota'));
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'verifikasi_calon_anggota_id',
        ]);

        try {
            Anggota::create($data);
            return redirect()->route('anggota.index')
                ->with('success', 'Anggota berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('warning', 'Anggota gagal ditambahkan. Data mungkin duplikat atau tidak ada');
        }
    }

    public function show($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->load('verifikasiCalonAnggota.calonAnggota');

        return view('sistem_anggota.anggota.show', compact('anggota'));
    }

    public function edit($id)
    {
        $calonAnggota = CalonAnggota::findOrFail($id);
        return view('sistem_anggota.anggota.edit', compact('calonAnggota'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'email',
            'nama_lengkap',
            'gender',
            'tempat_lahir',
            'tanggal_lahir',
            'alamat_lengkap',
            'status',
            'pekerjaan',
            'no_hp',
            'pilihan_kontribusi',
            // 'tentang_paskas',
            // 'pilar_paskas',
            // 'doa_harapan',
        ]);

        $calonAnggota = CalonAnggota::findOrFail($id);
        $calonAnggota->update($data);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }



    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')
            ->with('success', 'Anggota berhasil dihapus.');
    }
}
