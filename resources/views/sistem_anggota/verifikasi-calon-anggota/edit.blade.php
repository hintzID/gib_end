@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="bg-white shadow-lg rounded px-8 pt-6 pb-8 mb-4">
            <div class="flex justify-center items-center">
                <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                    <h1 class="text-4xl font-bold text-center py-4">Edit Verifikasi Anggota</h1>
                </div>
            </div>

            <form action="{{ route('verifikasi-calon-anggota.update', $verifikasiAnggota->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <label for="calon_anggota_id" class="block text-gray-700 font-bold mb-2">Nama Calon Anggota</label>
                    <input type="hidden" name="calon_anggota_id" value="{{ $verifikasiAnggota->calonAnggota->id }}">
                    <input type="text" value="{{ $verifikasiAnggota->calonAnggota->nama_lengkap }}"
                        class="block w-full border border-gray-300 rounded py-2 px-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                        disabled>
                </div>


                <div class="mb-6">
                    <label for="verifikasi" class="block text-gray-700 font-bold mb-2">Verifikasi</label>
                    <select name="verifikasi"
                        class="block w-full border border-gray-300 rounded py-2 px-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                        required>
                        <option value="1" {{ $verifikasiAnggota->verifikasi ? 'selected' : '' }}>Terverifikasi</option>
                        <option value="0" {{ !$verifikasiAnggota->verifikasi ? 'selected' : '' }}>Belum Terverifikasi
                        </option>
                    </select>
                </div>

                <div class="mb-6">
                    <label for="catatan" class="block text-gray-700 font-bold mb-2">Catatan</label>
                    <textarea name="catatan"
                        class="block w-full border border-gray-300 rounded py-2 px-3 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                        rows="4">{{ $verifikasiAnggota->catatan }}</textarea>
                </div>

                <div class="flex items-center">
                    <button type="submit"
                        class="px-4 py-2 mr-3 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">Simpan</button>
                    <a href="{{ route('verifikasi-calon-anggota.index') }}"
                        class="px-4 py-2 text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-600 focus:ring-offset-2">Kembali</a>
                </div>
            </form>
        </div>
    </div>
@endsection
