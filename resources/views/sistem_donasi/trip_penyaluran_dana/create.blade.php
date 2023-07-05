@extends('layouts.app')
@include('layouts.navbar')

@section('content')

    <div class="lg:w-full pr-4 pl-4">
        <div class="container mx-auto sm:px-4 ml-3">
            <div class="flex justify-center items-center">
                <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                    <h1 class="text-4xl font-bold text-center py-4">Tambah Daftar Trip Penyaluran Beras</h1>
                </div>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
            <strong>Error!</strong> Terdapat kesalahan dalam inputan:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('trip-penyaluran-dana.store') }}" method="POST">
        @csrf

        <div class="mb-2 m-9">
            <label class="font-bold dark:text-white" for="trip_id">Trip:</label>
            <select
                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                name="trip_id" required>
                @foreach ($daftarTrip as $trip)
                    <option value="{{ $trip->id }}">{{ $trip->nama_trip }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-2 m-9">
            <label class="font-bold dark:text-white " for="urutan_trip">Urutan Trip:</label>
            <input type="number"
                class="block appearance-none dark:text-blue-900 w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                name="urutan_trip" required>
        </div>

        <div class="mb-4 m-9">
            <label class="font-bold dark:text-white" for="pondok_id">Pondok:</label>
            <select
                class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                name="pondok_id" required>
                @if ($pondok->isEmpty())
                    <option disabled selected value="">Belum ada pondok tersedia, silahkan daftarkan pondok terlebih
                        dahulu di menu Calon Mitra</option>
                @else
                    @foreach ($pondok as $pondokItem)
                        <option value="{{ $pondokItem->id }}">{{ $pondokItem->calonMitra->nama_pondok }}</option>
                    @endforeach
                @endif
            </select>
        </div>


        <button type="submit"
            class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 ml-9 leading-normal no-underline bg-blue-500 text-white hover:bg-blue-900">Submit</button>

        <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-500 text-white hover:bg-gray-900"
            href="{{ route('trip-penyaluran-dana.index') }}">Kembali</a>

    </form>
    </div>
@endsection
