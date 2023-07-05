@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 shadow-lg w-1/2">
                <h1 class="text-4xl font-bold text-center py-4">Detail Pengguna</h1>
            </div>
        </div>

        <div
            class="relative flex flex-col min-w-0 rounded break-words border bg-white border-1 border-gray-300 shadow-md p-8">
            <div class="flex items-center justify-center mb-4">
                @if ($user->photo)
                    <img src="{{ asset('photos/' . $user->photo) }}" alt="Foto Pengguna"
                        class="w-32 h-32 object-cover border-4 border-white shadow-xl rounded-full">
                @else
                    <span class="text-red-500">Foto belum diunggah.</span>
                @endif
            </div>
            <h5 class="block text-lg font-semibold text-gray-800">Username: {{ $user->name }}</h5>
            <p class="block mt-1 text-base text-gray-600">Peran: <b>{{ $user->peran->peran }}</b></p>
            <hr class="my-4">
            <h5 class="block text-lg font-semibold text-gray-800">Nama:
                {{ $user->anggota->verifikasiCalonAnggota->calonAnggota->nama_lengkap }}</h5>
            <h5 class="block mt-1 text-lg font-semibold text-gray-800">Email: {{ $user->email }}</h5>
            <hr class="my-4">
            <p class="text-base text-gray-600">Terdaftar pada:
                {{ $user->created_at->locale('id')->isoFormat('dddd, D MMMM YYYY') }}</p>
            <hr class="my-4">
        </div>

        <a href="{{ route('user.index') }}"
            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-2 px-4 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700 mb-5 mt-4">Kembali</a>
    </div>
@endsection
