@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 ml-3">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2 shadow-lg">
                <h1 class="text-4xl font-bold text-center py-4">Form Daftar User Baru</h1>
            </div>
        </div>
        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="name" class="text-gray-800 font-bold">Username</label>
                <input type="text" name="name" id="name"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    value="" required>
            </div>
            <br>
            <div class="mb-4">
                <label for="email" class="text-gray-800 font-bold">Akun</label>
                <select name="email" id="email"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    required>
                    <option value="">Pilih Nama & Email Anggota</option>
                    @foreach ($anggota as $a)
                        <option class="text-green-700 drop-shadow-lg"
                            value="{{ $a->verifikasiCalonAnggota->calonAnggota->email }}"><b>NAMA</b> :
                            {{ $a->verifikasiCalonAnggota->calonAnggota->nama_lengkap }} || <b>EMAIL</b> :
                            {{ $a->verifikasiCalonAnggota->calonAnggota->email }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="mb-4">
                <label for="anggota_id" class="text-gray-800 font-bold">Konfirmasi Email</label>
                <select name="anggota_id" id="anggota_id"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    required>
                    <option value="">Pilih Email Dari Akun</option>
                    @foreach ($anggota as $a)
                        <option value="{{ $a->id }}">{{ $a->verifikasiCalonAnggota->calonAnggota->email }} </option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="mb-4">
                <label for="password" class="text-gray-800 font-bold">Password</label>
                <input type="password" name="password"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    required>
            </div>
            <br>
            <div class="mb-4">
                <label for="peran_id" class="text-gray-800 font-bold">Peran</label>
                <select name="peran_id"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                    required>
                    <option value="">Pilih Peran</option>
                    @foreach ($peran as $p)
                        <option value="{{ $p->id }}">{{ $p->peran }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="photo"></label>
                <input type="file" class="form-control-file" id="photo" name="photo">
            </div>

            <button type="submit"
                class="inline-block mt-4 align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan</button>
            <a href="{{ route('user.index') }}"
                class="inline-block mt-4 align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700">Kembali</a>
            <br><br>
        </form>
    </div>
@endsection
