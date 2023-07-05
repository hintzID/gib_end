@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 h-screen rounded p-6">
        <div class="flex flex-wrap ">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="flex justify-center items-center">
                    <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                        <h1 class="text-4xl font-bold text-center py-4">Daftar Pondok</h1>
                    </div>
                </div>
                <div class="mt-10 mb-6">
                    <a href="{{ route('pondok.create') }}"
                        class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-950/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Tambah
                        Calon Pondok</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div
                class="relative px-3 py-3 mb-4 border rounded bg-purple-200 dark:bg-blue-900 dark:text-white border-green-300 text-green-800">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="mb-3">
            <form action="{{ route('pondok.index') }}" method="GET">
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
                        placeholder="Cari anggota...">
                    <button type="submit"
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
                </div>
            </form>
        </div>

        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-blue-900 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-center">No</th>
                        <th scope="col" class="px-6 py-3 text-center">Nama Pondok</th>
                        <th scope="col" class="px-6 py-3 text-center">Contact Person</th>
                        <th scope="col" class="px-6 py-3 text-center">No. HP Contact Person</th>
                        <th scope="col" class="px-6 py-3 text-center">Keterangan</th>
                        <th scope="col" class="px-6 py-3 text-center">Action</th>
                    </tr>
                    @foreach ($pondoks as $pondok)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $pondok->calonMitra->nama_pondok }}</td>
                            <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pondok->contact_person }}</td>
                            <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pondok->no_hp_contact_person }}</td>
                            <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $pondok->keterangan }}</td>
                            <td class="px-6 py-4 text-center font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <form action="{{ route('pondok.destroy', $pondok->id) }}" method="POST">
                                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600"
                                        href="{{ route('pondok.show', $pondok->id) }}">Show</a>
                                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"
                                        href="{{ route('pondok.edit', $pondok->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>

            {!! $pondoks->links() !!}
        </div>
    @endsection
