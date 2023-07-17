@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4">
        <div class="flex flex-wrap">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="pull-left p-3 bg-white-500 m-2 w-1/4">
                    <h1 class="font-bold dark:text-white">Detail Pondok</h1>
                </div>
            </div>
        </div>

        <div class="flex flex-wrap">
            <table class="table-auto w-full">
                <tr>
                    <td class="font-bold pr-4 border p-2 dark:text-white">Calon Mitra:</td>
                    <td class="border p-2 dark:text-white">{{ $pondok->calonMitra->nama_pondok }}</td>
                </tr>
                <tr>
                    <td class="font-bold pr-4 border p-2 dark:text-white">Contact Person:</td>
                    <td class="border p-2 dark:text-white">{{ $pondok->contact_person }}</td>
                </tr>
                <tr>
                    <td class="font-bold pr-4 border p-2 dark:text-white">No. HP Contact Person:</td>
                    <td class="border p-2 dark:text-white">{{ $pondok->no_hp_contact_person }}</td>
                </tr>
                <tr>
                    <td class="font-bold pr-4 border p-2 dark:text-white">Keterangan:</td>
                    <td class="border p-2 dark:text-white">{{ $pondok->keterangan }}</td>
                </tr>
            </table>

            <div class="flex justify-end mt-4">
                <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600"
                    href="{{ route('pondok.index') }}">Back</a>
            </div>
        </div>
    </div>
@endsection
