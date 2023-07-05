@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="container mx-auto sm:px-4 p-6 rounded">
    <div class="flex justify-center items-center">
        <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2 shadow-lg">
            <h1 class="text-4xl font-bold text-center py-4">Calon Anggota Paskas</h1>
        </div>
    </div>

    <div class="bg-white dark:bg-blue-950 rounded-lg shadow-2xl overflow-hidden">
        <table class="w-full text-left h-screen">
            <tr>
                <th class="py-2 px-4 border-b  bg-gray-500 dark:bg-blue-950 text-white">ID Pendaftaran</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->id }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Email</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->email }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Nama Lengkap</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->nama_lengkap }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Jenis Kelamin</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->gender }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Tempat Lahir</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->tempat_lahir }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Tanggal Lahir</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Alamat Lengkap</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->alamat_lengkap }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Status</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->status }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Pekerjaan</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->pekerjaan }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Nomor HP/WA</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->no_hp }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Organisasi Diikuti</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->organisasi_diikuti }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Tentang Paskas</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->tentang_paskas }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Pilar PASKAS</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->pilar_paskas? 'Sanggup':'Tidak Sanggup' }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 border-b bg-gray-500 dark:bg-blue-950 text-white">Do'a dan Harapan</th>
                <td class="py-2 px-4 border-b dark:bg-gray-300 dark:text-blue-900">{{ $calonAnggota->doa_harapan }}</td>
            </tr>
        </table>
    </div>

    <a href="{{ route('calon-anggota.index') }}" class="inline-block mt-4 px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Kembali</a>
</div>
@endsection
