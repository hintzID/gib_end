@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex justify-center items-center">
            <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2 shadow-lg">
                <h1 class="text-4xl font-bold text-center py-4">Data Finansial</h1>
            </div>
        </div>
        <div class="mt-10 mb-6">
            <a href="{{ route('stok.create') }}"
                class="text-white bg-gradient-to-r from-teal-400 via-teal-500 to-teal-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-teal-300 dark:focus:ring-teal-800 shadow-lg shadow-teal-500/50 dark:shadow-lg dark:shadow-teal-950/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Tambah
                Catatan Pemasukan</a>
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
                }, 3000);
            </script>
        @endif

        {{-- ======= Drop Down Filter ====== --}}

        <form action="{{ route('stok.index') }}" method="GET" class="mb-5">
            <div class="flex items-center">
                <label for="search" class="mr-2">Tahun:</label>
                <select name="search" id="search" class="border border-gray-300 rounded-lg p-2">
                    <option value="">All</option>
                    @for ($year = date('Y'); $year >= 2020; $year--)
                        <option value="{{ $year }}" {{ $year == $search ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 ml-2 inline-flex items-center">
                    Filter
                    <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>
            </div>
        </form>



        {{-- ======= End Drop Down Filter ====== --}}

        <div class="overflow-x-auto shadow-2xl border mb-4 border-blue-200 sm:rounded-lg">
            <table class="w-full text-sm text-left mb-7 text-gray-500 ">
                <thead class="text-xs text-white uppercase bg-blue-500 dark:bg-blue-900 ">
                    <tr>
                        <th scope="col" rowspan="2" class="px-6 py-3 text-center border">No.</th>
                        <th scope="col" rowspan="2" class="px-6 py-3 border text-center">Tanggal</th>
                        <th scope="col" colspan="2" class="px-6 py-3 border text-center" title="dana masuk">Donasi
                        </th>
                        <th scope="col" colspan="2" class="px-6 py-3 border text-center" title="dana masuk">Harga
                            Beras</th>
                        <th scope="col" rowspan="2" class="px-6 py-3 border text-center" title="dana masuk">DPD 10%
                        </th>
                        <th scope="col" colspan="3" class="px-6 py-3 border text-center">Beras Didapat</th>
                        {{-- <th scope="col" colspan="2" class="px-6 py-3 border text-center">Pembulatan (SAK)</th> --}}
                        <th scope="col" rowspan="2" class="px-6 py-3 border text-center">Aksi</th>
                    </tr>
                    <tr>
                        <th scope="col" class="px-6 py-3 border text-center">Jumlah</th>
                        <th scope="col" class="px-6 py-3 border text-center">Tingkat Kenaikan/Turun %</th>
                        <th scope="col" class="px-6 py-3 border text-center">Harga</th>
                        <th scope="col" class="px-6 py-3 border text-center">Tingkat Kenaikan/Turun %</th>
                        <th scope="col" class="px-6 py-3 border text-center">KG</th>
                        <th scope="col" class="px-6 py-3 border text-center">SAK</th>
                        <th scope="col" class="px-6 py-3 border text-center">Tingkat Kenaikan/Turun %</th>
                        {{-- <th scope="col" class="px-6 py-3 border text-center">Pembulatan</th>
                        <th scope="col" class="px-6 py-3 border text-center">Cashback</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stok as $key => $item)
                        @if ($key > 0)
                            @php
                                $previousPrice = $stok[$key - 1]->harga_beras;
                                $reduction = round((($item->harga_beras - $previousPrice) / $previousPrice) * 100, 2);

                                $previousPrice2 = $stok[$key - 1]->dana_masuk;
                                $reduction2 = round((($item->dana_masuk - $previousPrice2) / $previousPrice2) * 100, 2);

                                $previousPrice3 = ($stok[$key - 1]->dana_masuk * 0.9) / $item->harga_beras;
                                $reduction3 = round(((($item->dana_masuk * 0.9) / $item->harga_beras - $previousPrice3) / $previousPrice3) * 100, 2);

                            @endphp
                        @else
                            @php
                                $reduction = 0; // Jika tidak ada harga beras sebelumnya, pengurangan diatur menjadi 0
                                $reduction2 = 0;
                                $reduction3 = 0;
                            @endphp
                        @endif

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ \Carbon\Carbon::parse($item->tanggal)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Rp.{{ number_format($item->dana_masuk, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($reduction2 < 0)
                                    <p class="text-red-700">{{ abs($reduction2) }}%</p>
                                @elseif ($reduction2 > 0)
                                    <p class="text-green-700">{{ $reduction2 }}%</p>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Rp.{{ number_format($item->harga_beras, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($reduction < 0)
                                    <p class="text-green-700">{{ abs($reduction) }}%</p>
                                @elseif ($reduction > 0)
                                    <p class="text-red-700">{{ $reduction }}%</p>
                                @else
                                    -
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ number_format($item->dana_masuk * 0.1, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">
                                {{ number_format(($item->dana_masuk * 0.9) / $item->harga_beras, 3, ',', '.') }} KG
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">
                                {{ number_format(($item->dana_masuk * 0.9) / $item->harga_beras / 20, 3, ',', '.') }} SAK
                            </td>
                            <td class="px-6 py-4 font-medium text-blue-900 text-center whitespace-nowrap dark:text-white">
                                sama seperti % Donasi
                            </td>
                            {{-- <td class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">
                                @php
                                $result = ($item->dana_masuk * 0.9) / $item->harga_beras / 20;
                                $roundedResult = ($result >= 5) ? floor($result) : ceil($result);
                                @endphp
                                {{ number_format($roundedResult, 0, ',', '.') }} SAK
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 text-center whitespace-nowrap dark:text-white">
                                @php
                                $result = ($item->dana_masuk * 0.9) / $item->harga_beras / 20;
                                $roundedResult = ($result >= 5) ? floor($result) : ceil($result);
                                @endphp
                               {{ number_format(($roundedResult - (($item->dana_masuk * 0.9) / $item->harga_beras / 20))*20* $item->harga_beras*(-1) , 0, ',', '.') }}
                            </td> --}}
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('stok.edit', $item->id) }}"
                                    class="inline-block px-4 py-2 mr-2 text-white bg-blue-600 rounded hover:bg-blue-700">Edit</a>
                                <form action="{{ route('stok.destroy', $item->id) }}" method="POST"
                                    style="display: inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-block px-4 py-2 text-white bg-red-600 rounded hover:bg-red-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="px-6 py-4 drop-shadow-lg text-red-700 font-extrabold" colspan="2">Total <p
                                class="text-green-700">Rata-rata</p>
                        </td>
                        <td class="px-6 py-4 font-medium text-red-700 whitespace-nowrap dark:text-white">
                            Rp.{{ number_format($stok->sum('dana_masuk'), 0, ',', '.') }}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ '-' }}
                        </td>
                        <td class="px-6 py-4 font-medium text-green-700 whitespace-nowrap dark:text-white">
                            Rp.{{ number_format($stok->avg('harga_beras'), 0, ',', '.') }}
                        </td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ '-' }}
                        </td>
                        <td class="px-6 py-4 font-medium text-red-700 whitespace-nowrap dark:text-white">
                            Rp.{{ number_format($stok->sum('dana_masuk') * 0.1, 0, ',', '.') }}</td>
                        <td class="px-6 py-4 font-medium text-red-700 whitespace-nowrap dark:text-white">
                            {{ number_format(
                                $stok->sum(function ($item) {
                                    return ($item->dana_masuk * 0.9) / $item->harga_beras;
                                }),
                                3,
                                ',',
                                '.',
                            ) }}
                            KG
                        </td>
                        <td class="px-6 py-4 font-medium text-red-700 whitespace-nowrap dark:text-white">
                            {{ number_format(
                                $stok->sum(function ($item) {
                                    return ($item->dana_masuk * 0.9) / $item->harga_beras / 20;
                                }),
                                3,
                                ',',
                                '.',
                            ) }}
                            SAK</td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ '-' }}
                            </td>
                            {{-- <td class="px-6 py-4 font-medium text-red-700 whitespace-nowrap dark:text-white">
                                {{ number_format(
                                    $stok->sum(function ($item) {
                                        $result = ($item->dana_masuk * 0.9) / $item->harga_beras / 20;

                                        if ($result < 5) {
                                            $result = ceil($result);
                                        } else {
                                            $result = floor($result);
                                        }

                                        return $result;
                                    }),
                                    3,
                                    ',',
                                    '.'
                                ) }}

                                SAK</td> --}}
                    </tr>
                </tbody>
            </table>
        </div>
    @endsection
