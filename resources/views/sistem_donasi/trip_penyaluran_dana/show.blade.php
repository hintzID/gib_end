@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap ">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="flex justify-center items-center">
                    <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg shadow-lg px-10 w-1/2">
                        <h1 class="text-4xl font-bold text-center py-4">Detail Trip Distribusi</h1>
                    </div>
                </div>
            </div>
        </div>
<form class="border rounded-lg dark:border-blue-900">
        <div class="mb-3 ml-3 mt-2 dark:text-white">
            <strong>Urutan Trip:</strong>
            {{ $tripPenyaluranDana->urutan_trip }}
        </div>

        <div class="mb-3 ml-3 dark:text-white">
            <strong>Trip:</strong>
            {{ $tripPenyaluranDana->daftarTrip->nama_trip }}
        </div>

        <div class="mb-3 ml-3 dark:text-white">
            <strong>Pondok:</strong>
            {{ $tripPenyaluranDana->pondok->calonMitra->nama_pondok }}
        </div>
    </form>
    <div class="pull-right mt-3">
        <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('trip-penyaluran-dana.index') }}">Kembali</a>
    </div>
    </div>
@endsection
