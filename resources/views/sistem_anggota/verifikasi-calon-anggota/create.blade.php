@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex justify-center items-center">
            <div class="bg-gradient-to-r from-teal-300 to-green-400 mb-10 rounded-lg px-10 w-1/2 shadow-lg">
                <h1 class="text-4xl font-bold text-center py-4 text-white">Tambah Verifikasi Anggota</h1>
            </div>
        </div>

        <!-- Tampilkan pesan sukses jika ada -->
        @if(session('error'))
            <div class="px-3 py-2 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('verifikasi-calon-anggota.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="calon_anggota_id" class="block mb-2 font-bold text-gray-800 dark:text-white">Nama Anggota</label>
                <select name="calon_anggota_id" class="block w-full py-2 px-4 mb-2 text-gray-800 bg-white border border-gray-300 rounded" required>
                    <option value="">Pilih Anggota</option>
                    @foreach ($calonAnggota as $a)
                        <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="verifikasi" class="block mb-2 font-bold text-gray-800 dark:text-white">Verifikasi</label>
                <select name="verifikasi" class="block w-full py-2 px-4 mb-2 text-gray-800 bg-white border border-gray-300 rounded" required>
                    <option value="0">Belum Terverifikasi</option>
                    <option value="1">Terverifikasi</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="catatan" class="block mb-2 font-bold text-gray-800 dark:text-white">Catatan</label>
                <textarea name="catatan" class="block w-full py-2 px-4 mb-2 text-gray-800 bg-white border border-gray-300 rounded" rows="4" required></textarea>
            </div>

            <div class="flex">
                <button type="submit" class="px-4 py-2 mr-3 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('verifikasi-calon-anggota.index') }}" class="px-4 py-2 text-white bg-gray-600 rounded hover:bg-gray-700">Kembali</a>
            </div>
        </form>
    </div>
@endsection
