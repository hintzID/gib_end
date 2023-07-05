@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 ml-3">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2 shadow-lg">
                <h1 class="text-4xl font-bold text-center py-4">Daftar User</h1>
            </div>
        </div>
        <div class="mt-10 mb-6">
            <a href="{{ route('user.create') }}"
                class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-950/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"><i
                    class="bi bi-person-plus"></i>&nbsp; Tambah User</a>
        </div>

        <div class="mb-3">
            <form action="{{ route('user.index') }}" method="GET">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="search" name="search" id="default-search"
                        class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari anggota..." value="{{ $search }}" required>
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 shadow-xl">Cari</button>
                </div>
            </form>
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
                        <th scope="col" class="px-6 py-3 border">No.</th>
                        <th scope="col" class="px-6 py-3 border">Username</th>
                        <th scope="col" class="px-6 py-3 border">Email</th>
                        <th scope="col" class="px-6 py-3 border">Peran</th>
                        <th scope="col" class="px-6 py-3 border">Photo</th>
                        <th scope="col" class="px-6 py-3 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->name }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->email }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $user->peran ? $user->peran->peran : '-' }}</td>
                            <td>
                                @if ($user->photo)
                                    <img src="{{ asset('photos/' . $user->photo) }}" alt="Foto User"
                                        class="w-10 h-10 rounded-full">
                                @else
                                    <span class="text-gray-500">Tidak ada foto</span>
                                @endif
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($user->anggota)
                                <a href="{{ route('user.show', $user->id) }}"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">
                                    <i class="bi bi-eye-fill"></i>&nbsp; Detail
                                </a>
                               @endif
                                <a href="{{ route('user.edit', $user->id) }}"
                                    class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-orange-400 text-black hover:bg-orange-500"><i
                                        class="bi bi-pencil-square"></i>&nbsp; Edit</a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')"><i
                                            class="bi bi-trash2"></i>&nbsp; Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Tidak ada user.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    @endsection
