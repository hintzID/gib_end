@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto h-screen sm:px-4">
        <div class="flex flex-wrap">
            <div class="lg:w-full pr-4 pl-4 margin-tb">
                <div class="flex justify-center items-center">
                    <div class="bg-purple-200 dark:bg-blue-900 dark:text-white mb-10 rounded-lg px-10 w-1/2">
                        <h1 class="text-4xl font-bold text-center py-4">form Edit Pondok</h1>
                    </div>
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

        <form action="{{ route('pondok.update', $pondok->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap ">
                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Calon Mitra:</strong>
                        <select
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            name="calon_mitra_id" disabled>
                            @foreach ($calonMitra as $mitra)
                                <option value="{{ $mitra->id }}"
                                    {{ $pondok->calon_mitra_id == $mitra->id ? 'selected' : '' }}>{{ $mitra->nama_pondok }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="calon_mitra_id" value="{{ $pondok->calon_mitra_id }}">
                    </div>
                </div>


                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Contact Person:</strong>
                        <input type="text" name="contact_person"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder="Contact Person" value="{{ $pondok->contact_person }}">
                    </div>
                </div>
                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>No. HP Contact Person:</strong>
                        <input type="number" name="no_hp_contact_person"
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            placeholder="No. HP Contact Person" value="{{ $pondok->no_hp_contact_person }}">
                    </div>
                </div>
                <div class="md:w-full pr-4 pl-4">
                    <div class="mb-4">
                        <strong>Keterangan:</strong>
                        <textarea
                            class="block appearance-none w-full py-1 px-2 mb-1 text-base leading-normal bg-white text-gray-800 border border-gray-200 rounded"
                            style="height:150px" name="keterangan" placeholder="Keterangan">{{ $pondok->keterangan }}</textarea>
                    </div>
                </div>
                <div class="md:w-full pr-4 pl-4 mb-10">
                    <button type="submit"
                        class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-blue-600 text-white hover:bg-blue-600">Update</button>

                    <a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-500 text-white hover:bg-gray-800"
                        href="{{ route('pondok.index') }}">Back</a>

                </div>
            </div>

        </form>
    </div>
@endsection
