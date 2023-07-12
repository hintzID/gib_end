@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 border p-6 rounded border-gray-900">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                <h1 class="text-4xl font-bold text-center py-4">Detail Calon Pondok Mitra</h1>
            </div>
        </div>


        <a href="{{ route('calon-mitra.index') }}"
            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700">Kembali</a>

        <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
            <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                <h3 class="text-2xl font-bold text-center py-4">Identitas Pondok</h3>
            </div>
            <div>
                <label class="font-bold" for="nama_pondok">Nama Pondok:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="nama_pondok" id="nama_pondok" value="{{ $calonMitra->nama_pondok }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" rows="3"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>{{ $calonMitra->alamat }}</textarea>
            </div>

            <div>
                <label class="font-bold" for="tanggal_berdiri">Tanggal Berdiri:</label>
                <input type="date" name="tanggal_berdiri" id="tanggal_berdiri" value="{{ $calonMitra->tanggal_berdiri }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
        </div>

        <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
            <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                <h3 class="text-2xl font-bold text-center py-4">Kepengurusan Pondok</h3>
            </div>

            <div>
                <label class="font-bold" for="nama_pimpinan">Nama Pimpinan:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="nama_pimpinan" id="nama_pimpinan" value="{{ $calonMitra->nama_pimpinan }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="profesi">Profesi Pimpinan:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="profesi" id="profesi" value="{{ $calonMitra->profesi }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="alamat_pimpinan">Alamat Pimpinan:</label>
                <textarea name="alamat_pimpinan" id="alamat_pimpinan" rows="3"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>{{ $calonMitra->alamat_pimpinan }}</textarea>
            </div>

            <div>
                <label class="font-bold" for="no_hp_pimpinan">No. HP Pimpinan:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="no_hp_pimpinan" id="no_hp_pimpinan" value="{{ $calonMitra->no_hp_pimpinan }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_pengurus_menetap">Jumlah Pengurus Menetap:</label>
                <input type="number" name="jumlah_pengurus_menetap" id="jumlah_pengurus_menetap"
                    value="{{ $calonMitra->jumlah_pengurus_menetap }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_pengurus_tidak_menetap">Jumlah Pengurus Tidak Menetap:</label>
                <input type="number" name="jumlah_pengurus_tidak_menetap" id="jumlah_pengurus_tidak_menetap"
                    value="{{ $calonMitra->jumlah_pengurus_tidak_menetap }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
        </div>

        <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
            <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                <h3 class="text-2xl font-bold text-center py-4">Keterangan Anak Asuh</h3>
            </div>
            <div>
                <label class="font-bold" for="jumlah_yatim_piatu">Jumlah Yatim Piatu:</label>
                <input type="number" name="jumlah_yatim_piatu" id="jumlah_yatim_piatu"
                    value="{{ $calonMitra->jumlah_yatim_piatu }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
            <div>
                <label class="font-bold" for="jumlah_yatim">Jumlah Yatim:</label>
                <input type="number" name="jumlah_yatim" id="jumlah_yatim"
                    value="{{ $calonMitra->jumlah_yatim }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
            <div>
                <label class="font-bold" for="jumlah_mustahiq">Jumlah Mustahiq:</label>
                <input type="number" name="jumlah_mustahiq" id="jumlah_mustahiq" value="{{ $calonMitra->jumlah_mustahiq }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_piatu">Jumlah Santri Berprestasi:</label>
                <input type="number" name="jumlah_piatu" id="jumlah_piatu"
                    value="{{ $calonMitra->jumlah_piatu }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_dll">Jumlah Lainnya:</label>
                <input type="text" name="jumlah_dll" id="jumlah_dll" value="{{ $calonMitra->jumlah_dll }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
            <div>
                <label class="font-bold" for="keterangan_jumlah_dll">Keterangan Jumlah Lainnya:</label>
                <input type="text" name="keterangan_jumlah_dll" id="keterangan_jumlah_dll" value="{{ $calonMitra->keterangan_jumlah_dll }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
            <div>
                <label class="font-bold" for="jumlah_tk">Jumlah TK-PAUD:</label>
                <input type="number" name="jumlah_tk" id="jumlah_tk" value="{{ $calonMitra->jumlah_tk }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_sd">Jumlah SD:</label>
                <input type="number" name="jumlah_sd" id="jumlah_sd" value="{{ $calonMitra->jumlah_sd }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_smp">Jumlah SMP:</label>
                <input type="number" name="jumlah_smp" id="jumlah_smp" value="{{ $calonMitra->jumlah_smp }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_sma">Jumlah SMA:</label>
                <input type="number" name="jumlah_sma" id="jumlah_sma" value="{{ $calonMitra->jumlah_sma }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="jumlah_kuliah">Jumlah Kuliah:</label>
                <input type="number" name="jumlah_kuliah" id="jumlah_kuliah" value="{{ $calonMitra->jumlah_kuliah }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
        </div>

        <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
            <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                <h3 class="text-2xl font-bold text-center py-4">Kondisi Pondok</h3>
            </div>
            <div>
                <label class="font-bold" for="status_milik_tanah">Status Milik Tanah:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="status_milik_tanah" id="status_milik_tanah" value="{{ $calonMitra->status_milik_tanah }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="luas_tanah">Luas Tanah:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="luas_tanah" id="luas_tanah" value="{{ $calonMitra->luas_tanah }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div>
                <label class="font-bold" for="keterangan_fasilitas">Keterangan Fasilitas:</label>
                <textarea name="keterangan_fasilitas" id="keterangan_fasilitas" rows="3"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    readonly>{{ $calonMitra->keterangan_fasilitas }}</textarea>
            </div>

            <div>
                <label class="font-bold" for="sumber_air">Sumber Air:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="sumber_air" id="sumber_air" value="{{ $calonMitra->sumber_air }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>
        </div>

        <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
            <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                <h3 class="text-2xl font-bold text-center py-4">Penilaian Surveyor</h3>
            </div>
            <div>
                <label class="font-bold" for="tingkat_layak">Tingkat Layak:</label>
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="tingkat_layak" id="tingkat_layak" value="{{ $calonMitra->tingkat_layak }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <div class="mb-3">
                <label class="font-bold" for="prioritas">Grade:</label>
                @php
                $alias = '';
                switch ($calonMitra->prioritas) {
                    case 'A':
                        $alias = 'Siasah';
                        break;
                    case 'B':
                        $alias = 'Strategis';
                        break;
                    case 'C':
                        $alias = 'Distribusi';
                        break;
                    case 'E':
                        $alias = 'Tidak Ada';
                        break;
                    default:
                        $alias = 'Alias Default';
                }
                @endphp
                <input type="text"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="prioritas" id="prioritas" value="{{ $alias }}"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    readonly>
            </div>

            <a href="{{ route('calon-mitra.index') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700">Kembali</a>
        </div>
    </div>
@endsection
