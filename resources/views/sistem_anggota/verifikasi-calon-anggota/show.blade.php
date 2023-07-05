@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                <h1 class="text-4xl font-bold text-center py-4">Detail Verifikasi Anggota</h1>
            </div>
        </div>

        <table class="relative flex flex-col min-w-0 rounded break-words border bg-white dark:bg-gray-400 border-1 border-gray-300">
            <tr>
                <th class="py-3 px-6 mb-0 bg-gray-200 dark:bg-blue-950 dark:text-white rounded border-b-1 border-gray-300 text-gray-900" colspan="2">
                    Calon Anggota
                </th>
            </tr>
            <tr>
                <td class="flex-auto p-6">
                    <strong>ID Pendaftaran :</strong>
                </td>
                <td class="flex-auto p-6">
                    {{ $verifikasiAnggota->calon_anggota_id }}
                </td>
            </tr>
            <!-- Add other information about the candidate member -->
        </table>

        <table class="relative flex flex-col min-w-0 rounded break-words border bg-white dark:bg-gray-400 border-1 border-gray-300 mt-4">
            <tr>
                <th class="py-3 px-6 mb-0 bg-gray-200 dark:bg-blue-950 dark:text-white rounded border-b-1 border-gray-300 text-gray-900" colspan="2">
                    Verifikasi
                </th>
            </tr>
            <tr>
                <td class="flex-auto p-6">
                    <strong>Status :</strong>
                </td>
                <td class="flex-auto p-6 {{ $verifikasiAnggota->verifikasi ? 'text-green-700' : 'text-red-400' }}">
                    {{ $verifikasiAnggota->verifikasi ? 'Terverifikasi' : 'Belum Terverifikasi' }}
                </td>
            </tr>
            <tr>
                <td class="flex-auto p-6">
                    <strong>Catatan :</strong>
                </td>
                <td class="flex-auto p-6">
                    {{ $verifikasiAnggota->catatan }}
                </td>
            </tr>
        </table>

        <a href="{{ route('verifikasi-calon-anggota.index') }}"
            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700 mt-4">Kembali</a>
    </div>
@endsection
