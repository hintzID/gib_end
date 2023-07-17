@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 ml-3">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                <h1 class="text-4xl font-bold text-center py-4">Form Daftar Peran</h1>
            </div>
        </div>

        <form action="{{ route('peran.store') }}" method="POST">
            @csrf


            <div class="mb-4">
                <label for="peran">Peran</label>
                <select name="peran" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" required>
                    <option value="komandan">Komandan</option>
                    <option value="admin" @if(\App\Models\Peran::where('peran', 'admin')->exists()) hidden @endif>Admin</option>
                </select>
            </div>



            <div class="mb-4">
                <label for="keterangan">Keterangan</label>
                <input type="text" name="keterangan"
                    class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded">
            </div>
            <br>
            <button type="submit"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Simpan</button>
            <a href="{{ route('peran.index') }}"
                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700">Kembali</a>
        </form>
    </div>
@endsection
