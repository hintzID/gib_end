@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex justify-center items-center">
            
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                <h1 class="text-4xl font-bold text-center py-4">Edit Calon Anggota</h1>
            </div>
        </div>


        <form action="{{ route('anggota.update', $calonAnggota->id) }}" method="POST" class="max-w-md mx-auto">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="email" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Email</label>
                <input type="email" name="email"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    value="{{ $calonAnggota->email }}" required>
            </div>

            <div class="mb-6">
                <label for="nama_lengkap" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Nama Lengkap</label>
                <input type="text" name="nama_lengkap"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    value="{{ $calonAnggota->nama_lengkap }}" required>
            </div>

            <div class="mb-6">
                <label for="gender" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Jenis Kelamin</label>
                <select name="gender"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    required>
                    <option value="Laki-Laki" {{ $calonAnggota->gender == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki
                    </option>
                    <option value="Perempuan" {{ $calonAnggota->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                    </option>
                </select>
            </div>

            <div class="mb-6">
                <label for="tempat_lahir" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Tempat Lahir</label>
                <input type="text" name="tempat_lahir"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    value="{{ $calonAnggota->tempat_lahir }}" required>
            </div>

            <div class="mb-6">
                <label for="tanggal_lahir" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    value="{{ $calonAnggota->tanggal_lahir }}" required>
            </div>

            <div class="mb-6">
                <label for="alamat_lengkap" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Alamat Lengkap</label>
                <textarea name="alamat_lengkap"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    required>{{ $calonAnggota->alamat_lengkap }}</textarea>
            </div>

            <div class="mb-6">
                <label for="status" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Status</label>
                <select name="status"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    required>
                    <option value="Menikah" {{ $calonAnggota->status == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                    <option value="Belum Menikah" {{ $calonAnggota->status == 'Belum Menikah' ? 'selected' : '' }}>Belum
                        Menikah</option>
                    <option value="Janda" {{ $calonAnggota->status == 'Janda' ? 'selected' : '' }}>Janda</option>
                    <option value="Duda" {{ $calonAnggota->status == 'Duda' ? 'selected' : '' }}>Duda</option>
                </select>
            </div>

            <div class="mb-6">
                <label for="pekerjaan" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">Pekerjaan</label>
                <input type="text" name="pekerjaan"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    value="{{ $calonAnggota->pekerjaan }}" required>
            </div>

            <div class="mb-6">
                <label for="no_hp" class="block text-lg font-bold text-gray-800 dark:text-white mb-2">No.Telp / WA</label>
                <input type="text" name="no_hp"
                    class="block w-full py-2 px-3 mb-3 text-base text-gray-800 border border-gray-300 dark:bg-gray-400 rounded focus:outline-none focus:border-blue-500"
                    value="{{ $calonAnggota->no_hp }}" required>
            </div>

            <div class="flex">
                <button type="submit"
                    class="inline-block mb-16 py-2 px-4 font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('anggota.index') }}"
                    class="inline-block mb-16 py-2 px-4 ml-4 font-semibold text-white bg-gray-600 rounded hover:bg-gray-700">Kembali</a>
            </div>
        </form>

    </div>
@endsection
