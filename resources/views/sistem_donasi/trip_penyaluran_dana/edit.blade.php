@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="container mx-auto sm:px-4">
  <div class="flex flex-wrap">
    <div class="lg:w-full pr-4 pl-4 margin-tb">
      <div class="flex justify-center items-center">
        <div class="bg-gradient-to-r from-green-400 to-blue-500 mb-10 rounded-lg px-10 py-8 w-1/2 shadow-lg">
          <h1 class="text-4xl font-bold text-white text-center mb-4">Edit Trip Penyaluran Dana</h1>
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

  <form action="{{ route('trip-penyaluran-dana.update', $tripPenyaluranDana->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-4">
      <label for="urutan_trip" class="block dark:text-white font-bold">Urutan Trip:</label>
      <input type="number" name="urutan_trip" class="block dark:bg-gray-300 w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" value="{{ $tripPenyaluranDana->urutan_trip }}" required>
    </div>

    <div class="mb-4">
      <label for="trip_id" class="block dark:text-white font-bold">Trip:</label>
      <select name="trip_id" class="block dark:bg-gray-300 w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
        @foreach ($daftarTrip as $trip)
        <option value="{{ $trip->id }}" {{ $tripPenyaluranDana->trip_id == $trip->id ? 'selected' : '' }}>{{ $trip->nama_trip }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-4">
        <label for="pondok_id" class="block dark:text-white font-bold">Pondok:</label>
        <select name="pondok_id" class="block dark:bg-gray-300 w-full py-2 px-4 mb-2 text-base leading-normal bg-white text-gray-800 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
          @foreach ($pondok as $pondokItem)
          <option value="{{ $pondokItem->id }}" {{ $tripPenyaluranDana->pondok_id == $pondokItem->id ? 'selected' : '' }}>{{ $pondokItem->calonMitra->nama_pondok }}</option>
          @endforeach
        </select>
      </div>      

      <div class="flex">
    <button type="submit" class="inline-block py-2 px-4 text-white bg-blue-600 rounded hover:bg-blue-700">Update</button>
        <a href="{{ route('trip-penyaluran-dana.index') }}" class="py-2 px-4 text-white ml-3 bg-gray-600 rounded hover:bg-gray-700">Kembali</a>
  </form>
</div>
</div>
@endsection
