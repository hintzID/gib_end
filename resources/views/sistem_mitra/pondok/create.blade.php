@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto sm:px-4 border p-6 rounded">
        <div class="flex flex-wrap ">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="pull-right mb-3">
                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600" href="{{ route('pondok.index') }}">Back</a>
                </div>
                <div class="pull-left">
                    <h2>Tambah Data Pondok</h2>
                </div>
            </div>
        </div>

        @if ($errors->any())
            <div class="relative px-3 py-3 mb-4 border rounded bg-red-200 border-red-300 text-red-800">
                <strong>Error!</strong> Please fix the following errors:<br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pondok.store') }}" method="POST">
            @csrf

            <div class="flex flex-wrap ">
                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Calon Mitra:</strong>
                        <select class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" name="calon_mitra_id" {{ $calonMitra->isEmpty() ? 'disabled' : '' }}>
                            @if ($calonMitra->isEmpty())
                                <option value="">Tidak ada data calon mitra</option>
                            @else
                                @foreach ($calonMitra as $mitra)
                                    <option value="{{ $mitra->id }}">{{ $mitra->nama_pondok }}</option>
                                @endforeach
                            @endif
                        </select>
                        @if ($calonMitra->isEmpty())
                            <small class="text-red-600">Tidak ada data calon mitra yang tersedia.</small>
                        @endif
                    </div>
                </div>

                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Nama Penanggung Jawab:</strong>
                        <input type="text" name="contact_person" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" placeholder="Contact Person">
                    </div>
                </div>
                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>No. HP Contact Person:</strong>
                        <input type="number" name="no_hp_contact_person" class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder="No. HP Contact Person">
                    </div>
                </div>
                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Keterangan:</strong>
                        <textarea class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded" style="height:150px" name="keterangan" placeholder="Keterangan"></textarea>
                    </div>
                </div>
                <div class="md:w-full pr-4 pl-4 text-center">

                </div>
            </div>
            <button type="submit" class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600 mt-2">Submit</button>
        </form>
    </div>
@endsection
