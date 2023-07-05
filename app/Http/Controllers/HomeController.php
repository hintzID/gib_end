<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pondok;
use App\Models\DaftarOta;
use App\Models\Stok;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $totalAnggota = Anggota::count();
        $totalPondok = Pondok::count();
        $totalDaftarOta = DaftarOta::count();

        // Ambil tahun dari filter search jika tersedia, jika tidak, gunakan tahun saat ini
        $tahun = $request->input('search') ?? date('Y');
        // Inisialisasi array untuk menyimpan total donasi per bulan
        $totalBerasDonasiPerBulan = [];

        // Loop melalui bulan-bulan dalam setahun
        for ($bulan = 1; $bulan <= 12; $bulan++) {
            // Hitung total beras donasi perbulan pada tahun dan bulan tertentu
            $totalBerasDonasi = Stok::whereYear('tanggal', $tahun)
                ->whereMonth('tanggal', $bulan)
                ->sum(DB::raw('dana_masuk* 0.9 / harga_beras / 20 '));

            // Tambahkan total donasi per bulan ke array
            $totalBerasDonasiPerBulan[] = $totalBerasDonasi;
        }

        // Hitung total dana_masuk perbulan pada tahun tertentu
        $totalDanaMasuk = Stok::whereYear('tanggal', $tahun)
            ->sum('dana_masuk');

        $totalBerasDonasi = Stok::whereYear('tanggal', $tahun)
            ->sum(DB::raw('dana_masuk* 0.9 / harga_beras / 20 '));

        return view('home', compact('totalAnggota', 'totalDaftarOta', 'totalPondok', 'totalDanaMasuk', 'totalBerasDonasiPerBulan', 'tahun', 'totalBerasDonasi'));
    }
}
