<?php

namespace App\Http\Controllers;

use App\Models\Pondok;
use App\Models\CalonMitra;
use Illuminate\Http\Request;

class CalonMitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $calonMitras = CalonMitra::where(function ($query) use ($search) {
            $query->where('nama_pondok', 'like', "%$search%")
                ->orWhere('alamat', 'like', "%$search%")
                ->orWhere('nama_pimpinan', 'like', "%$search%");
        })
        ->whereDoesntHave('pondok')
        ->paginate(10);

        return view('sistem_mitra.calon-mitra.index', compact('calonMitras'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sistem_mitra.calon-mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pondok' => 'required',
            'alamat' => 'required',
            'tanggal_berdiri' => 'required|date',
            'nama_pimpinan' => 'required',
            'profesi' => 'required',
            'alamat_pimpinan' => 'required',
            'no_hp_pimpinan' => 'required',
            'jumlah_pengurus_menetap' => 'required|integer',
            'jumlah_pengurus_tidak_menetap' => 'required|integer',
            'jumlah_yatim_piatu' => 'required|integer',
            'jumlah_yatim' => 'required|integer',
            'jumlah_piatu' => 'required|integer',
            'jumlah_mustahiq' => 'required|integer',
            'jumlah_dll' => 'required',
            'keterangan_jumlah_dll' => 'required',
            'jumlah_tk' => 'required|integer',
            'jumlah_sd' => 'required|integer',
            'jumlah_smp' => 'required|integer',
            'jumlah_sma' => 'required|integer',
            'jumlah_kuliah' => 'required|integer',
            'status_milik_tanah' => 'required',
            'luas_tanah' => 'required',
            'keterangan_fasilitas' => 'nullable',
            'sumber_air' => 'required',
            'tingkat_layak' => 'required',
            'prioritas' => 'required',
        ]);

        CalonMitra::create($validatedData);

        return redirect()->route('calon-mitra.index')->with('success', 'Calon Mitra berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CalonMitra  $calonMitra
     * @return \Illuminate\Http\Response
     */
    public function show(CalonMitra $calonMitra)
    {
        return view('sistem_mitra.calon-mitra.show', compact('calonMitra'));
    }


    public function edit(CalonMitra $calonMitra)
    {
        return view('sistem_mitra.calon-mitra.edit', compact('calonMitra'));
    }


    public function update(Request $request, CalonMitra $calonMitra)
    {
        $validatedData = $request->validate([
            'nama_pondok' => 'required',
            'alamat' => 'required',
            'tanggal_berdiri' => 'required|date',
            'nama_pimpinan' => 'required',
            'profesi' => 'required',
            'alamat_pimpinan' => 'required',
            'no_hp_pimpinan' => 'required',
            'jumlah_pengurus_menetap' => 'required|integer',
            'jumlah_pengurus_tidak_menetap' => 'required|integer',
            'jumlah_yatim_piatu' => 'required|integer',
            'jumlah_yatim' => 'required|integer',
            'jumlah_piatu' => 'required|integer',
            'jumlah_mustahiq' => 'required|integer',
            'jumlah_dll' => 'required',
            'keterangan_jumlah_dll' => 'required',
            'jumlah_tk' => 'required|integer',
            'jumlah_sd' => 'required|integer',
            'jumlah_smp' => 'required|integer',
            'jumlah_sma' => 'required|integer',
            'jumlah_kuliah' => 'required|integer',
            'status_milik_tanah' => 'required',
            'luas_tanah' => 'required',
            'keterangan_fasilitas' => 'nullable',
            'sumber_air' => 'required',
            'tingkat_layak' => 'required',
            'prioritas' => 'required',
        ]);

        $calonMitra->update($validatedData);

        return redirect()->route('calon-mitra.index')->with('success', 'Calon Mitra berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CalonMitra  $calonMitra
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalonMitra $calonMitra)
    {
        $calonMitra->delete();

        return redirect()->route('calon-mitra.index')->with('success', 'Calon Mitra berhasil dihapus.');
    }
}
