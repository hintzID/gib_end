@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4">Add Prioritas</h1>

        <form action="{{ route('prioritas.store') }}" method="POST" class="w-full max-w-lg">
            @csrf

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="grade">Grade:</label>
                <input type="text" name="grade" id="grade" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('grade')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="persen">Persen:</label>
                <input type="number" name="persen" id="persen" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('persen')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add</button>
                <a href="{{ route('prioritas.index') }}" class="text-gray-700 text-sm">Back to List</a>
            </div>
        </form>
    </div>
@endsection
