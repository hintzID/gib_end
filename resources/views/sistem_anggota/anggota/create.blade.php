@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <h1 class="text-4xl font-bold mb-8">Tambah Anggota Baru</h1>

        @if (session('warning'))
            <div id="warning-message"
                class="relative px-4 py-3 mb-8 border rounded bg-orange-200 border-orange-300 text-orange-800">
                {{ session('warning') }}
            </div>
            <script>
                setTimeout(function() {
                    document.getElementById('warning-message').remove();
                }, 4000);
            </script>
        @endif


        <form action="{{ route('anggota.store') }}" method="POST">
            @csrf

            <div class="mb-8">
                <label for="verifikasi_calon_anggota_id" class="block mb-2 text-lg font-medium text-gray-800">Nama Anggota Baru</label>
                <select name="verifikasi_calon_anggota_id" class="block w-full py-2 px-4 mb-2 text-base leading-normal bg-white border border-gray-200 rounded
                    @if ($verifikasiCalonAnggota->isEmpty() || !$verifikasiCalonAnggota->contains('verifikasi', 1))
                        text-red-800
                    @else
                        text-green-400
                    @endif">
                    @if ($verifikasiCalonAnggota->isEmpty())
                        <option selected value="">Silahkan lakukan verifikasi anggota terlebih dahulu di menu Verifikasi Calon Anggota</option>
                    @else
                        @foreach ($verifikasiCalonAnggota as $a)
                            @if ($a->verifikasi == 1)
                                <option value="{{ $a->id }}">{{ $a->calonAnggota->nama_lengkap }}</option>
                            @endif
                        @endforeach
                    @endif
                </select>
            </div>





            <div class="flex items-center">
                <button type="submit"
                    class="inline-block px-6 py-3 text-lg font-medium leading-tight text-white bg-blue-600 rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Simpan</button>
                <a href="{{ route('anggota.index') }}"
                    class="inline-block ml-2 px-6 py-3 text-lg font-medium leading-tight text-white bg-gray-600 rounded hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Kembali</a>
            </div>
        </form>
    </div>
    <script>
        setTimeout(function() {
            var alertElement = document.querySelector('.alert');
            if (alertElement) {
                alertElement.style.display = 'none';
            }
        }, 2000);
    </script>

@endsection
