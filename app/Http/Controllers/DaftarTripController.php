<?php

namespace App\Http\Controllers;

use App\Models\DaftarTrip;
use App\Models\Anggota;
use Illuminate\Http\Request;

class DaftarTripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftarTrips = DaftarTrip::all();
        $anggota = Anggota::all();

        return view('sistem_donasi.daftar_trip.index', compact('daftarTrips', 'anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $anggota = Anggota::whereDoesntHave('daftarTrip')->get();
        return view('sistem_donasi.daftar_trip.create', compact('anggota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_trip' => 'required',
            'keterangan' => 'nullable',
            'anggota_id' => 'nullable',
        ]);

        DaftarTrip::create($data);

        return redirect()->route('daftar_trip.index')
            ->with('success', 'Daftar Trip berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DaftarTrip  $daftarTrip
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarTrip $daftarTrip)
    {
        $anggota = Anggota::all();
        return view('sistem_donasi.daftar_trip.edit', compact('daftarTrip','anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DaftarTrip  $daftarTrip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DaftarTrip $daftarTrip)
    {
        $data = $request->validate([
            'nama_trip' => 'required',
            'keterangan' => 'nullable',
            'anggota_id' => 'nullable',
        ]);

        $daftarTrip->update($data);

        return redirect()->route('daftar_trip.index')
            ->with('success', 'Daftar Trip berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $daftarTrip = DaftarTrip::findOrFail($id);
        $daftarTrip->delete();

        return redirect()->route('daftar_trip.index')
            ->with('success', 'Daftar Trip berhasil dihapus');
    }

}
