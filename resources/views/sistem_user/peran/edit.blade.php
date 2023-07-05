@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="container mx-auto sm:px-4">
  <div class="flex justify-center items-center">
    <div class="bg-gradient-to-r from-blue-400 to-blue-500 mb-10 shadow-xl rounded-lg px-10 py-8 w-1/2">
      <h1 class="text-4xl font-bold text-white text-center mb-4">Edit Peran</h1>
      <form action="{{ route('peran.update', $peran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
          <label for="peran" class="block text-white font-semibold">Peran</label>
          <input type="text" name="peran" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $peran->peran }}" required>
        </div>
        <div class="mb-4">
          <label for="keterangan" class="block text-white font-semibold">Keterangan</label>
          <input type="text" name="keterangan" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $peran->keterangan }}">
        </div>
        <div class="flex justify-end">
          <button type="submit" class="inline-block py-2 px-4 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none">Simpan</button>
          <a href="{{ route('peran.index') }}" class="inline-block py-2 px-4 ml-2 text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none">Kembali</a>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
