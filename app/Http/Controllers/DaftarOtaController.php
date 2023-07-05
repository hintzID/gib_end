<?php

namespace App\Http\Controllers;

use App\Models\DaftarOta;
use App\Models\Anggota;
use Illuminate\Http\Request;

class DaftarOtaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $daftarOtas = DaftarOta::with('anggota')
            ->when($search, function ($query) use ($search) {
                $query->where('nama', 'like', "%$search%")
                    ->orWhere('jenis_kelamin', 'like', "%$search%")
                    ->orWhere('pekerjaan', 'like', "%$search%")
                    ->orWhere('alamat', 'like', "%$search%")
                    ->orWhere('nomor_hp', 'like', "%$search%");
            })
            ->paginate(10);

        return view('sistem_ota.daftar_ota.index', compact('daftarOtas'));
    }

    public function create()
    {
        $anggota = Anggota::all();
        return view('sistem_ota.daftar_ota.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'anggota_id' => 'required',
        ]);

        DaftarOta::create($request->all());

        return redirect()->route('daftar-ota.index')
            ->with('success', 'Data Daftar OTA berhasil ditambahkan');
    }
    public function show($id)
    {
        $daftarOta = DaftarOta::findOrFail($id);
        return view('sistem_ota.daftar_ota.show', compact('daftarOta'));
    }


    public function edit($id)
    {
        $daftarOta = DaftarOta::findOrFail($id);
        $anggota = Anggota::all();
        return view('sistem_ota.daftar_ota.edit', compact('daftarOta', 'anggota'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'nomor_hp' => 'required',
            'anggota_id' => 'required',
        ]);

        $daftarOta = DaftarOta::findOrFail($id);
        $daftarOta->nama = $request->input('nama');
        $daftarOta->jenis_kelamin = $request->input('jenis_kelamin');
        $daftarOta->pekerjaan = $request->input('pekerjaan');
        $daftarOta->alamat = $request->input('alamat');
        $daftarOta->nomor_hp = $request->input('nomor_hp');
        $daftarOta->anggota_id = $request->input('anggota_id');
        $daftarOta->save();

        return redirect()->route('daftar-ota.index')
            ->with('success', 'Data Daftar OTA berhasil diperbarui');
    }


    public function destroy($id)
    {
        DaftarOta::findOrFail($id)->delete();

        return redirect()->route('daftar-ota.index')
            ->with('success', 'Data Daftar OTA berhasil dihapus');
    }

}
