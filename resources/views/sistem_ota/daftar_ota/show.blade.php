@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container-ota h-screen mx-auto sm:px-4  border">
        <div class="flex flex-wrap">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="flex justify-center items-center">
                    <div class="bg-purple-200 dark:bg-blue-900  mb-10 rounded-lg px-10 w-1/2">
                        <h1 class="text-4xl font-bold dark:text-white text-center py-4">Detail OTA</h1>
                    </div>
                </div>
            </div>
        </div>

        <table class="w-full shadow-lg bg-white rounded-lg divide-y divide-gray-200">
            <tr>
                <th class="px-6 py-3 bg-green-400 hover:bg-green-600 rounded-tl-lg text-left w-1/5">ID OTA:</th>
                <td class="px-6 py-3 rounded-tr-lg dark:text-gray-900 border">{{ $daftarOta->id }}</td>
            </tr>
            <tr>
                <th class="px-6 py-3 bg-green-400 hover:bg-green-600 text-left">Nama:</th>
                <td class="px-6 py-3 rounded-tr-lg dark:text-gray-900 border">{{ $daftarOta->nama }}</td>
            </tr>
            <tr>
                <th class="px-6 py-3 bg-green-400 hover:bg-green-600 text-left">Jenis Kelamin:</th>
                <td class="px-6 py-3 dark:text-gray-900 border">{{ $daftarOta->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th class="px-6 py-3 bg-green-400 hover:bg-green-600 text-left">Pekerjaan:</th>
                <td class="px-6 py-3 dark:text-gray-900 border">{{ $daftarOta->pekerjaan }}</td>
            </tr>
            <tr>
                <th class="px-6 py-3 bg-green-400 hover:bg-green-600 text-left">Alamat:</th>
                <td class="px-6 py-3 dark:text-gray-900 border">{{ $daftarOta->alamat }}</td>
            </tr>
            <tr>
                <th class="px-6 py-3 bg-green-400 hover:bg-green-600 text-left">Nomor HP:</th>
                <td class="px-6 py-3 dark:text-gray-900 border">{{ $daftarOta->nomor_hp }}</td>
            </tr>
            <tr>
                <th class="px-6 py-3 bg-green-400 hover:bg-green-600 rounded-bl-lg text-left" title="Fundraiser">FR:</th>
                <td class="px-6 py-3 rounded-br-lg dark:text-gray-900 border">{{ $daftarOta->anggota->verifikasiCalonAnggota->calonAnggota->nama_lengkap }}</td>
            </tr>
        </table>

        <div class="mt-3 mb-3">
            <a href="{{ route('daftar-ota.index') }}"
                class="inline-block align-middle text-center select-none shadow-lg border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-blue-800">Kembali</a>
        </div>
    </div>
@endsection
