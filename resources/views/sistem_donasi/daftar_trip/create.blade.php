@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container sm:px-4 h-screen rounded">
        <div class="flex flex-wrap">
            <div class="lg:w-full pr-4 pl-4">
                <div class="flex justify-center items-center">
                    <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                        <h1 class="text-4xl font-bold text-center py-4">Tambah Jalur Distribusi</h1>
                    </div>
                </div>

                @if ($errors->any())
                    <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
                        <strong>Error!</strong> Terdapat beberapa masalah dengan inputan Anda.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="h-screen" action="{{ route('daftar_trip.store') }}" method="POST">
                    @csrf

                    <div class="flex flex-wrap">
                        <div class="md:w-full dark:text-white pr-4 pl-4">
                            <div class="mb-4">
                                <strong>Nama Jalur Distribusi:</strong>
                                <input type="text" name="nama_trip"
                                    class="block appearance-none dark:bg-gray-300 dark:text-blue-900 w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                    placeholder="Nama Trip">
                            </div>
                        </div>

                        <div class="md:w-full dark:text-white pr-4 pl-4">
                            <div class="mb-4">
                                <label class="font-bold dark:text-white" for="anggota_id">PJ Jalur Distribusi:</label>
                                <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                        name="anggota_id" required>
                                    @foreach ($anggota as $a)
                                        <option value="{{ $a->id }}">{{ $a->verifikasiCalonAnggota->calonAnggota->nama_lengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="md:w-full dark:text-white pr-4 pl-4">
                            <div class="mb-4">
                                <strong>Keterangan:</strong>
                                <textarea class="block appearance-none dark:bg-gray-300 dark:text-blue-900 w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                                          style="height:150px" name="keterangan" placeholder="Keterangan">
                                </textarea>
                            </div>
                        </div>

                        <div class="pr-4 pl-4 mt-2">
                            <button type="submit"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Submit</button>
                            <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-500 text-white hover:bg-gray-800"
                               href="{{ route('daftar_trip.index') }}">Kembali</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
