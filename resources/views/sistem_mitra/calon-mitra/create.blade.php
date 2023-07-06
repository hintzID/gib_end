@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 p-6 rounded border-gray-900">
        @auth


        @endauth
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                <h1 class="text-4xl font-bold text-center py-4">Form Calon Pondok Mitra</h1>
            </div>
        </div>

        <a href="{{ route('calon-mitra.index') }}"
            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700">Kembali</a>
        <form action="{{ route('calon-mitra.store') }}" method="POST">
            @csrf

            <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
                <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                    <h3 class="text-2xl font-bold text-center py-4">Identitas Pondok</h3>
                </div>
                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="nama_pondok">Nama Pondok:</label>
                    <input type="text" name="nama_pondok" id="nama_pondok" value="{{ old('nama_pondok') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('nama_pondok')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="alamat">Alamat:</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="tanggal_berdiri">Tanggal Berdiri:</label>
                    <input type="date" name="tanggal_berdiri" id="tanggal_berdiri" value="{{ old('tanggal_berdiri') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('tanggal_berdiri')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
                <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                    <h3 class="text-2xl font-bold text-center py-4">Kepengurusan Pondok</h3>
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="nama_pimpinan">Nama Pimpinan:</label>
                    <input type="text" name="nama_pimpinan" id="nama_pimpinan" value="{{ old('nama_pimpinan') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('nama_pimpinan')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="profesi">Profesi Pimpinan:</label>
                    <input type="text" name="profesi" id="profesi" value="{{ old('profesi') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('profesi')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="alamat_pimpinan">Alamat Pimpinan:</label>
                    <textarea name="alamat_pimpinan" id="alamat_pimpinan" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>{{ old('alamat_pimpinan') }}</textarea>
                    @error('alamat_pimpinan')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="no_hp_pimpinan">No. HP Pimpinan:</label>
                    <input type="number" name="no_hp_pimpinan" id="no_hp_pimpinan" value="{{ old('no_hp_pimpinan') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('no_hp_pimpinan')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_pengurus_menetap">Jumlah Pengurus Menetap:</label>
                    <input type="number" name="jumlah_pengurus_menetap" id="jumlah_pengurus_menetap"
                        value="{{ old('jumlah_pengurus_menetap') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_pengurus_menetap')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_pengurus_tidak_menetap">Jumlah Pengurus Tidak Menetap:</label>
                    <input type="number" name="jumlah_pengurus_tidak_menetap" id="jumlah_pengurus_tidak_menetap"
                        value="{{ old('jumlah_pengurus_tidak_menetap') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_pengurus_tidak_menetap')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
                <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                    <h3 class="text-2xl font-bold text-center py-4">Keterangan Anak Asuh</h3>
                </div>
                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_yatim_piatu">Jumlah Yatim Piatu:</label>
                    <input type="number" name="jumlah_yatim_piatu" id="jumlah_yatim_piatu"
                        value="{{ old('jumlah_yatim_piatu') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_yatim_piatu')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_yatim">Jumlah Yatim:</label>
                    <input type="number" name="jumlah_yatim" id="jumlah_yatim"
                        value="{{ old('jumlah_yatim') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_yatim')
                        <span>{{ $message }}</span>
                    @enderror
                </div>                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_piatu">Jumlah Piatu:</label>
                    <input type="number" name="jumlah_piatu" id="jumlah_piatu"
                        value="{{ old('jumlah_piatu') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_piatu')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_mustahiq">Jumlah Mustahiq:</label>
                    <input type="number" name="jumlah_mustahiq" id="jumlah_mustahiq" value="{{ old('jumlah_mustahiq') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_mustahiq')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_dll">Jumlah Lainnya:</label>
                    <input type="number" name="jumlah_dll" id="jumlah_dll" value="{{ old('jumlah_dll') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="" required>
                    @error('jumlah_dll')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="keterangan_jumlah_dll">Keterangan Jumlah Lainnya:</label>
                    <input type="text" name="keterangan_jumlah_dll" id="keterangan_jumlah_dll" value="{{ old('keterangan_jumlah_dll') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="tulis dengan format, misal -> fakir: 12 ; jika tidak ada maka tulis : 0" required>
                    @error('keterangan_jumlah_dll')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_tk">Jumlah TK-PAUD:</label>
                    <input type="number" name="jumlah_tk" id="jumlah_tk" value="{{ old('jumlah_tk') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_tk')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_sd">Jumlah SD:</label>
                    <input type="number" name="jumlah_sd" id="jumlah_sd" value="{{ old('jumlah_sd') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_sd')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_smp">Jumlah SMP:</label>
                    <input type="number" name="jumlah_smp" id="jumlah_smp" value="{{ old('jumlah_smp') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_smp')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_sma">Jumlah SMA:</label>
                    <input type="number" name="jumlah_sma" id="jumlah_sma" value="{{ old('jumlah_sma') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_sma')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="jumlah_kuliah">Jumlah Kuliah:</label>
                    <input type="number" name="jumlah_kuliah" id="jumlah_kuliah" value="{{ old('jumlah_kuliah') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('jumlah_kuliah')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
                <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                    <h3 class="text-2xl font-bold text-center py-4">Kondisi Pondok</h3>
                </div>
                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="status_milik_tanah">Status Milik Tanah:</label>
                    <input type="text" name="status_milik_tanah" id="status_milik_tanah"
                        value="{{ old('status_milik_tanah') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('status_milik_tanah')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="luas_tanah">Luas Tanah:</label>
                    <input type="text" name="luas_tanah" id="luas_tanah" value="{{ old('luas_tanah') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('luas_tanah')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="keterangan_fasilitas">Keterangan Fasilitas:</label>
                    <textarea name="keterangan_fasilitas" id="keterangan_fasilitas" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Ditulis dengan format, nama_fasilitas(jumlah, kondisi); contoh : masjid(1, baik), kulkas(2, rusak)">{{ old('keterangan_fasilitas') }}</textarea>
                    @error('keterangan_fasilitas')
                        <span>{{ $message }}</span>
                    @enderror
                </div>

                <div class="mt-5">
                    <label class="font-bold dark:text-white" for="sumber_air">Sumber Air:</label>
                    <input type="text" name="sumber_air" id="sumber_air" value="{{ old('sumber_air') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        required>
                    @error('sumber_air')
                        <span>{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="container mx-auto sm:px-4 border mt-4 mb-4 p-6 rounded">
                <div class="border mt-5 mb-3 p-2 bg-gray-200 rounded">
                    <h3 class="text-2xl font-bold text-center py-4">Penilaian Surveyor</h3>
                </div>

               <div class="mt-5">
    <label class="font-bold dark:text-white" for="tingkat_layak">Tingkat Layak:</label>
    <select name="tingkat_layak" id="tingkat_layak"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        <option value="">Pilih tingkat layak</option>
        <option value="Layak" {{ old('tingkat_layak') == 'Layak' ? 'selected' : '' }}>Layak</option>
        <option value="Tidak Layak" {{ old('tingkat_layak') == 'Tidak Layak' ? 'selected' : '' }}>Tidak Layak</option>
    </select>
    @error('tingkat_layak')
        <span>{{ $message }}</span>
    @enderror
</div>

<div class="mb-3" class="mt-5">
    <label class="font-bold dark:text-white" for="prioritas">Grade:</label>
    <select name="prioritas" id="prioritas"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        required>
        <option value="">Pilih grade</option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
        <option value="E">E</option>
    </select>
    @error('prioritas')
        <span>{{ $message }}</span>
    @enderror
</div>

<script>
    const tingkatLayak = document.getElementById('tingkat_layak');
    const prioritas = document.getElementById('prioritas');

    tingkatLayak.addEventListener('change', function() {
        if (tingkatLayak.value === 'Layak') {
            prioritas.options[0].selected = true;
            prioritas.options[0].hidden = false;
            prioritas.options[1].hidden = false;
            prioritas.options[2].hidden = false;
            prioritas.options[3].hidden = false;
            prioritas.options[4].hidden = false;
            prioritas.options[5].hidden = true;
        } else if (tingkatLayak.value === 'Tidak Layak') {
            prioritas.options[5].selected = true;
            prioritas.options[0].hidden = true;
            prioritas.options[1].hidden = true;
            prioritas.options[2].hidden = true;
            prioritas.options[3].hidden = true;
            prioritas.options[4].hidden = true;
        }
        else if (tingkatLayak.value === '') {
            prioritas.option.hidden = true;
        }
    });
</script>



            <button type="submit"
                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-blue text-gray-800 border border-gray-200 rounded inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan</button>
        </form>
    </div>
@endsection
