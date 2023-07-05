@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="">
        <div class="flex flex-wrap ">
            <div class="md:w-2/3 pr-4 pl-4 md:mx-1/5">
                <div class="relative flex flex-col min-w-0 rounded break-words border bg-white dark:bg-blue-950 border-1 border-gray-300 dark:border-blue-500 shadow-md p-8">
                    <div class="flex items-center justify-center mb-4">
                        @if ($anggota->verifikasiCalonAnggota->calonAnggota->photo)
                        <img src="{{ asset('photos/' . $anggota->verifikasiCalonAnggota->calonAnggota->photo) }}" alt="Foto Anggota" class="w-32 h-32 object-cover border-4 border-white shadow-xl rounded-full">
                        @else
                            <span class="text-red-500">Foto belum diunggah.</span>
                        @endif
                    </div>
                    <table class="w-full max-w-full mb-4 bg-transparent text-left">
                        <tbody>
                            <tr>
                                <th class="dark:text-white">Anggota ID</th>
                                <td class="dark:text-white">PS.1.00{{ $anggota->id }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Nama Lengkap</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->nama_lengkap }}</td>
                            </tr>
                            <!-- Tambahkan kolom lain yang ingin ditampilkan -->
                            <tr>
                                <th class="dark:text-white">Email</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->email }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Gender</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->gender }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Tempat Lahir</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->tempat_lahir }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Tanggal Lahir</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->tanggal_lahir }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Alamat Lengkap</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->alamat_lengkap }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Status</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->status }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Pekerjaan</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->pekerjaan }}</td>
                            </tr>
                            <tr>
                                <th class="dark:text-white">Nomor HP/ WA</th>
                                <td class="dark:text-white">{{ $anggota->verifikasiCalonAnggota->calonAnggota->no_hp }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('anggota.index') }}" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 dark:bg-blue-700 dark:border-blue-300 text-white hover:bg-gray-700">Kembali</a>
                </div>
            </div>
        </div>
    </div>
@endsection
