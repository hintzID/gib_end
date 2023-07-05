@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap ">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="pull-left">
                    <h2>Show Pondok</h2>
                </div>
                <div class="pull-right">
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('pondok.index') }}">Back</a>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap ">
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>Calon Mitra:</strong>
                    {{ $pondok->calonMitra->nama_pondok }}
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>Contact Person:</strong>
                    {{ $pondok->contact_person }}
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>No. HP Contact Person:</strong>
                    {{ $pondok->no_hp_contact_person }}
                </div>
            </div>
            <div class="sm:w-full pr-4 pl-4 sm:w-full pr-4 pl-4 md:w-full pr-4 pl-4">
                <div class="mb-4">
                    <strong>Keterangan:</strong>
                    {{ $pondok->keterangan }}
                </div>
            </div>
        </div>
    </div>
@endsection
