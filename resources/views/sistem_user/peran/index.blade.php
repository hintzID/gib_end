@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 ml-3">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2 shadow-lg">
                <h1 class="text-4xl font-bold text-center py-4">Daftar Peran</h1>
            </div>
        </div>

        <div class="mt-10 mb-6">
            @if ($peran->count() < 2)
                <a href="{{ route('peran.create') }}"
                    class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-950/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Tambah
                    Peran</a>
            @else
                <button
                    class="text-white bg-gray-600 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                    disabled>Tambah Peran</button>
            @endif
        </div>

        <!-- Tampilkan pesan sukses jika ada -->
        @if ($message = Session::get('success'))
            <div id="success-message"
                class="relative px-3 py-3 mb-4 border rounded bg-purple-200 dark:bg-blue-900 dark:text-white border-green-300 text-green-800">
                <p>{{ $message }}</p>
            </div>

            <script>
                setTimeout(function() {
                    document.getElementById('success-message').remove();
                }, 4000);
            </script>
        @endif

        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-blue-900 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 border text-center">No</th>
                        <th scope="col" class="px-6 py-3 border text-center">Peran</th>
                        <th scope="col" class="px-6 py-3 border text-center">Keterangan</th>
                        <th scope="col" class="px-6 py-3 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peran as $key => $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{ $key + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{ $item->peran }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{ $item->keterangan }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                {{-- <a href="{{ route('peran.show', $item->id) }}"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600"><i
                                        class="bi bi-eye"></i>&nbsp; Lihat</a> --}}
                                <a href="{{ route('peran.edit', $item->id) }}"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-orange-400 text-black hover:bg-orange-500"><i
                                        class="bi bi-pencil-square"></i>&nbsp; Edit</a>
                                        @if($item->peran !== 'admin')
                                        <form action="{{ route('peran.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus peran ini?')"><i
                                                    class="bi bi-trash2"></i>&nbsp; Hapus</button>
                                        </form>
                                    @else
                                        <button type="button"
                                            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-300 text-gray-500 cursor-not-allowed"
                                            disabled><i class="bi bi-trash2"></i>&nbsp; Hapus</button>
                                    @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
