@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2 shadow-lg">
                <h1 class="text-4xl font-bold text-center py-4">Tambah Pemasukan Beras</h1>
            </div>
        </div>
        <form action="{{ route('stok.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="tanggal" class="block font-semibold">Tanggal</label>
                <input type="date" name="tanggal"
                    class="block w-full px-4 py-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    required>
            </div>
            <div class="mb-4">
                <label for="dana_masuk" class="block font-semibold">Dana Masuk</label>
                <input type="number" name="dana_masuk"
                    class="block w-full px-4 py-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="mb-4">
                <label for="harga_beras" class="block font-semibold">Harga Beras</label>
                <input type="number" name="harga_beras"
                    class="block w-full px-4 py-2 border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <div class="flex space-x-4">
                <button type="submit"
                    class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('stok.index') }}"
                    class="inline-block px-4 py-2 text-white bg-gray-500 rounded hover:bg-gray-700">Kembali</a>
            </div>
        </form>
    </div>
    </div>
@endsection
