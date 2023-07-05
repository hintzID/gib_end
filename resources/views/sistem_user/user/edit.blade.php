@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="container mx-auto sm:px-4 flex justify-center items-center">
  <div class="bg-gradient-to-r from-blue-500 to-indigo-600 mb-10 rounded-lg px-10 py-8 w-1/2">
    <h1 class="text-4xl font-bold text-white text-center mb-4">Form Edit Pengguna</h1>
    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="mb-4">
        <label for="name" class="block text-white font-bold">Username</label>
        <input type="text" name="name" id="name" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:border-blue-500" value="{{ $user->name }}" required>
      </div>

      <div class="mb-4">
        <label for="peran_id" class="block text-white font-bold">Peran</label>
        <select name="peran_id" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:border-blue-500">
          @foreach ($peran as $p)
          <option value="{{ $p->id }}" {{ $p->id == $user->peran_id ? 'selected' : '' }}>
            {{ $p->peran }}
          </option>
          @endforeach
        </select>
      </div>

      <div class="mb-4">
        <label for="photo" class="block text-white font-bold"></label>
        <div class="flex">
          <label for="file-upload" class="relative cursor-pointer bg-blue-600 py-2 px-4 rounded-md text-white font-bold hover:bg-blue-700 focus-within:outline-none">
            <span>Upload Foto</span>
            <input id="file-upload" type="file" name="photo" class="sr-only">
          </label>
          <p id="file-name" class="ml-2 text-gray-200"></p>
        </div>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="inline-block mt-4 py-2 px-6 text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none">Simpan</button>
        <a href="{{ route('user.index') }}" class="inline-block mt-4 py-2 px-6 ml-2 text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none">Kembali</a>
      </div>
    </form>
  </div>
</div>

<script>
  document.getElementById('file-upload').addEventListener('change', function() {
    var file = document.getElementById('file-upload').files[0];
    document.getElementById('file-name').textContent = file.name;
  });
</script>
@endsection






{{-- <br>
<div class="mb-4">
    <label for="email">Akun</label>
    <select name="email" id="email" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" required>
        <option value="">Pilih Nama & Email Anggota</option>
        @foreach ($anggota as $a)
            <option value="{{ $a->verifikasiCalonAnggota->calonAnggota->email }}" {{ $a->verifikasiCalonAnggota->calonAnggota->email == $user->email ? 'selected' : '' }}>
                <b>NAMA</b> : {{ $a->verifikasiCalonAnggota->calonAnggota->nama_lengkap }} ### EMAIL : {{ $a->verifikasiCalonAnggota->calonAnggota->email }}
            </option>
        @endforeach
    </select>
</div>
<br>
<div class="mb-4">
    <label for="anggota_id">Konfirmasi Email</label>
    <select name="anggota_id" id="anggota_id" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" required>
        <option value="">Pilih Email Dari Akun</option>
        @foreach ($anggota as $a)
            <option value="{{ $a->id }}" {{ $a->verifikasiCalonAnggota->calonAnggota->email == $user->email ? 'selected' : '' }}>
                {{ $a->verifikasiCalonAnggota->calonAnggota->email }}
            </option>
        @endforeach
    </select>
</div>
<br> --}}
{{-- <div class="mb-4">
    <label for="password">Password</label>
    <input type="password" name="password" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" required>
</div>
<br> --}}