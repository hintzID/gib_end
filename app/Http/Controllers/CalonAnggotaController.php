<?php

namespace App\Http\Controllers;

use App\Models\CalonAnggota;
use App\Models\VerifikasiCalonAnggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalonAnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        $calonAnggota = CalonAnggota::when($keyword, function ($query) use ($keyword) {
            $query->where('nama_lengkap', 'like', "%$keyword%");
        })
        ->whereDoesntHave('verifikasiCalonAnggota') // Hanya ambil calon anggota yang belum memiliki verifikasi
        ->paginate(10);

        return view('sistem_anggota.calon-anggota.index', compact('calonAnggota'));
    }


    public function show($id)
    {
        $calonAnggota = CalonAnggota::findOrFail($id);
        return view('sistem_anggota.calon-anggota.show', compact('calonAnggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistem_anggota.calon-anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
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
            'organisasi_diikuti',
            'tentang_paskas',
            'pilar_paskas',
            'doa_harapan',
        ]);

        CalonAnggota::create($data);

        if (!Auth::check()) {
            return redirect('/login')->with('success', 'Anda Sudah terdaftar, silahkan tunggu konfirmasi dari admin');
        }

        return redirect()->route('calon-anggota.index')->with('success', 'Anggota berhasil ditambahkan');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CalonAnggota  $calonAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calonAnggota = CalonAnggota::findOrFail($id);
        return view('sistem_anggota.calon-anggota.edit', compact('calonAnggota'));
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
            'organisasi_diikuti',
            'tentang_paskas',
            'pilar_paskas',
            'doa_harapan',
        ]);

        $calonAnggota = CalonAnggota::findOrFail($id);
        $calonAnggota->update($data);

        return redirect()->route('calon-anggota.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalonAnggota  $calonAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CalonAnggota::findOrFail($id)->delete();

        return redirect()->route('calon-anggota.index')->with('success', 'Calon anggota berhasil dihapus.');
    }

}

