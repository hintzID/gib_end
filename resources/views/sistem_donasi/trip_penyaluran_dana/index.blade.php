@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap ">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="flex justify-center items-center">
                    <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 shadow-lg w-1/2">
                        <h1 class="text-4xl font-bold text-center py-4">Jalur Distribusi Donasi</h1>
                    </div>
                </div>
                <div class="mt-10 mb-6">
                    <a href="{{ route('trip-penyaluran-dana.create') }}"
                        class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-950/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Tambah
                        Jalur Distribusi Donasi</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div
                class="relative px-3 py-3 mb-4 border rounded bg-purple-200 dark:bg-blue-900 dark:text-white border-green-300 text-green-800">
                <p>{{ $message }}</p>
            </div>
        @endif

        <form action="{{ route('trip-penyaluran-dana.index') }}" method="GET" role="search">
            <div class="relative flex items-stretch w-full mb-3">
                <select
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="filter_trip">
                    <option value="">Pilih Semua</option>
                    @foreach ($daftarTrip as $trip)
                        <option value="{{ $trip->id }}">{{ $trip->nama_trip }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                    <button
                        class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="submit">Filter</button>
                </div>
            </div>
        </form>


        <div class="relative overflow-x-auto shadow-2xl sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 ">
                <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-blue-900 ">
                    <tr>
                        <th scope="col" class="px-6 py-3 border text-center" rowspan="2">No</th>
                        <th scope="col" class="px-6 py-3 border text-center" rowspan="2">Trip</th>
                        <th scope="col" class="px-6 py-3 border text-center" rowspan="2">Urutan Trip</th>
                        <th scope="col" class="px-6 py-3 border text-center" rowspan="2">Nama Pondok</th>
                        <th scope="col" class="px-6 py-3 border text-center" rowspan="2">Alamat Pondok</th>
                        <th scope="col" class="px-6 py-3 border text-center" colspan="2">Grade Pondok</th>
                        <th scope="col" class="px-6 py-3 border text-center" colspan="3">Rencana Donasi</th>
                        <th scope="col" class="px-6 py-3 border text-center" colspan="2">Contact Person</th>
                        <th scope="col" class="px-6 py-3 border text-center" rowspan="2">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 border text-center"> Grade</th>
                        <th scope="col" class="px-6 border text-center"> Persentase Dapat</th>
                        <th scope="col" class="px-6 border text-center"> Jumlah Santri</th>
                        <th scope="col" class="px-6 border text-center"> KG</th>
                        <th scope="col" class="px-6 border text-center"> SAK</th>
                        <th scope="col" class="px-6 border text-center"> Ustadz/ah</th>
                        <th scope="col" class="px-6 border text-center"> No HP/WA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tripPenyaluranDana as $key => $trip)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $key + 1 }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->daftarTrip->nama_trip }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->urutan_trip }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->pondok->calonMitra->nama_pondok }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->pondok->calonMitra->alamat }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->pondok->calonMitra->prioritas }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($trip->pondok->calonMitra->prioritas == 'A')
                                    100%
                                @elseif ($trip->pondok->calonMitra->prioritas == 'B')
                                    75%
                                @elseif ($trip->pondok->calonMitra->prioritas == 'C')
                                    50%
                                @elseif ($trip->pondok->calonMitra->prioritas == 'D')
                                    25%
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->pondok->calonMitra->jumlah_tk +
                                    $trip->pondok->calonMitra->jumlah_sd +
                                    $trip->pondok->calonMitra->jumlah_smp +
                                    $trip->pondok->calonMitra->jumlah_sma +
                                    $trip->pondok->calonMitra->jumlah_kuliah }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @php
                                    $prioritas = $trip->pondok->calonMitra->prioritas;
                                    $nilaiPrioritas = 0;

                                    switch ($prioritas) {
                                        case 'A':
                                            $nilaiPrioritas = 1;
                                            break;
                                        case 'B':
                                            $nilaiPrioritas = 0.75;
                                            break;
                                        case 'C':
                                            $nilaiPrioritas = 0.5;
                                            break;
                                        case 'D':
                                            $nilaiPrioritas = 0.25;
                                            break;
                                    }

                                    $totalNilai = ($trip->pondok->calonMitra->jumlah_tk + $trip->pondok->calonMitra->jumlah_sd + $trip->pondok->calonMitra->jumlah_smp + $trip->pondok->calonMitra->jumlah_sma + $trip->pondok->calonMitra->jumlah_kuliah) * 7 * $nilaiPrioritas;
                                @endphp

                                {{ $totalNilai }}
                            </td>

                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @php
                                    $prioritas = $trip->pondok->calonMitra->prioritas;
                                    $nilaiPrioritas = 0;

                                    switch ($prioritas) {
                                        case 'A':
                                            $nilaiPrioritas = 1;
                                            break;
                                        case 'B':
                                            $nilaiPrioritas = 0.75;
                                            break;
                                        case 'C':
                                            $nilaiPrioritas = 0.5;
                                            break;
                                        case 'D':
                                            $nilaiPrioritas = 0.25;
                                            break;
                                    }

                                    $totalNilai = ($trip->pondok->calonMitra->jumlah_tk + $trip->pondok->calonMitra->jumlah_sd + $trip->pondok->calonMitra->jumlah_smp + $trip->pondok->calonMitra->jumlah_sma + $trip->pondok->calonMitra->jumlah_kuliah) * 7 * $nilaiPrioritas;
                                @endphp

                                {{ $totalNilai / 20 }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->pondok->contact_person }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $trip->pondok->no_hp_contact_person }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <form action="{{ route('trip-penyaluran-dana.destroy', $trip->id) }}" method="POST">
                                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-teal-500 text-white hover:bg-teal-600"
                                        href="{{ route('trip-penyaluran-dana.show', $trip->id) }}">Detail</a>
                                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"
                                        href="{{ route('trip-penyaluran-dana.edit', $trip->id) }}">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-red-600 text-white hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
            </table>

            {{ $tripPenyaluranDana->links() }}
        </div>
    @endsection
