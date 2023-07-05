@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="container mx-auto sm:px-4">
  <div class="flex justify-center items-center">
    <div class="bg-gradient-to-r from-blue-500 to-indigo-500 mb-10 shadow-2xl rounded-lg px-10 py-8 w-1/2">
      <h1 class="text-4xl font-bold text-white text-center mb-4">Edit Pemasukan</h1>
      <form action="{{ route('stok.update', $stok->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
          <label for="tanggal" class="block text-white font-semibold">Tanggal</label>
          <input type="date" name="tanggal" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $stok->tanggal }}" required>
        </div>
        <div class="mb-4">
          <label for="dana_masuk" class="block text-white font-semibold">Dana Masuk</label>
          <input type="text" name="dana_masuk" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $stok->dana_masuk }}">
        </div>
        <div class="mb-4">
          <label for="harga_beras" class="block text-white font-semibold">Harga Beras</label>
          <input type="text" name="harga_beras" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $stok->harga_beras }}">
        </div>
        <div class="flex justify-end">
          <button type="submit" class="inline-block py-2 px-4 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none">Simpan</button>
          <a href="{{ route('stok.index') }}" class="inline-block py-2 px-4 ml-2 text-gray-600 bg-gray-200 rounded hover:bg-gray-300 focus:outline-none">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
