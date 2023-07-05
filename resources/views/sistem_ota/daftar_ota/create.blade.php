@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container h-screen mx-auto sm:px-4 p-6">
        <div class="flex flex-wrap ">
            <div class="lg:w-full pr-4 pl-4 dark:text-white margin-tb ">
                <div class="flex flex-wrap ">
                    <div class="lg:w-full pr-4 pl-4 dark:text-white margin-tb">
                        <div class="flex justify-center items-center">
                            <div
                                class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2 shadow-lg">
                                <h1 class="text-4xl font-bold text-center drop-shadow-lg py-4">Tambah Daftar OTA</h1>
                            </div>
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

                <form action="{{ route('daftar-ota.store') }}" method="POST" class="mb-5
        form-container">
                    @csrf

                    <div class="flex flex-wrap">
                        <div class="md:w-full pr-4 pl-4 dark:text-white">
                            <div class="mb-4">
                                <strong>Nama:</strong>
                                <input type="text" name="nama"
                                    class="block appearance-none w-full py-1 dark:bg-gray-500 dark:text-white px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    placeholder="Nama">
                            </div>
                        </div>
                        <div class="md:w-full pr-4 pl-4 dark:text-white">
                            <div class="mb-4">
                                <strong>Jenis Kelamin:</strong>
                                <select
                                    class="block appearance-none w-full py-1 dark:bg-gray-500 dark:text-white px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    name="jenis_kelamin">
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="md:w-full pr-4 pl-4 dark:text-white">
                            <div class="mb-4">
                                <strong>Pekerjaan:</strong>
                                <input type="text" name="pekerjaan"
                                    class="block appearance-none w-full py-1 dark:bg-gray-500 dark:text-white px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    placeholder="Pekerjaan">
                            </div>
                        </div>
                        <div class="md:w-full pr-4 pl-4 dark:text-white">
                            <div class="mb-4">
                                <strong>Alamat:</strong>
                                <textarea
                                    class="block appearance-none w-full py-1 dark:bg-gray-500 dark:text-white px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    style="height:150px" name="alamat" placeholder="Alamat"></textarea>
                            </div>
                        </div>
                        <div class="md:w-full pr-4 pl-4 dark:text-white">
                            <div class="mb-4">
                                <strong>Nomor HP:</strong>
                                <input type="number" name="nomor_hp"
                                    class="block appearance-none w-full py-1 dark:bg-gray-500 dark:text-white px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    placeholder="Nomor HP">
                            </div>
                        </div>
                        <div class="md:w-full pr-4 pl-4 dark:text-white">
                            <div class="mb-4">
                                <strong>FR:</strong>
                                <select
                                    class="block appearance-none w-full py-1 dark:bg-gray-500 dark:text-white px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    name="anggota_id">
                                    @foreach ($anggota as $a)
                                        <option value="{{ $a->id }}">
                                            {{ $a->verifikasiCalonAnggota->calonAnggota->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="md:w-full pr-4 pl-4 dark:text-white">
                            <button type="submit"
                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan</button>
                            <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-500 text-white hover:bg-gray-800"
                                href="{{ route('daftar-ota.index') }}">Kembali</a>

                        </div>
                    </div>

                </form>
            </div>
        @endsection
