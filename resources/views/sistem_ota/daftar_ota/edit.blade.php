@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container h-screen mx-auto sm:px-4">
        <div class="flex flex-wrap ">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="flex justify-center items-center">
                    <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                        <h1 class="text-4xl font-bold text-center py-4">Edit OTA</h1>
                    </div>
                </div>
                <div class="pull-right">
                    <a class="inline-block align-middle text-center select-none font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"
                        href="{{ route('daftar-ota.index') }}">Kembali</a>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
                <strong>Error!</strong> Terdapat masalah dengan inputan Anda. Silakan periksa kembali.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('daftar-ota.update', $daftarOta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap ">
                <div class="mb-3 md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Nama:</strong>
                        <input type="text" name="nama" value="{{ $daftarOta->nama }}"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder="Nama">
                    </div>
                </div>
                <div class="mb-3 md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Jenis Kelamin:</strong>
                        <input type="text" name="jenis_kelamin" value="{{ $daftarOta->jenis_kelamin }}"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder="Jenis Kelamin">
                    </div>
                </div>
                <div class="mb-3 md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Pekerjaan:</strong>
                        <input type="text" name="pekerjaan" value="{{ $daftarOta->pekerjaan }}"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder="Pekerjaan">
                    </div>
                </div>
                <div class="mb-3 md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Alamat:</strong>
                        <textarea
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            style="height:150px" name="alamat" placeholder="Alamat">{{ $daftarOta->alamat }}</textarea>
                    </div>
                </div>
                <div class="mb-3 md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Nomor HP:</strong>
                        <input type="text" name="nomor_hp" value="{{ $daftarOta->nomor_hp }}"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder="Nomor HP">
                    </div>
                </div>
                <div class="mb-3 md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Anggota:</strong>
                        <select
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            name="anggota_id">
                            @foreach ($anggota as $a)
                                <option value="{{ $a->id }}" @if ($daftarOta->anggota_id == $a->id) selected @endif>
                                    {{ $a->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-10 text-center">
                    <button type="submit"
                        class="inline-block align-middle text-center select-none  font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan</button>
                </div>
            </div>

        </form>
    </div>
@endsection
