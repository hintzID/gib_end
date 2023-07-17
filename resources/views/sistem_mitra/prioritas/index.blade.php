@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container mx-auto">
        <h1 class="text-2xl font-bold mb-4 dark:text-white">Daftar Grade</h1>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-4 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('prioritas.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4 inline-block rounded">Add Prioritas</a>

        <table class="w-full">
            <thead>
                <tr>
                    <th class="bg-gray-200 text-gray-800 font-bold py-2 px-4">Grade</th>
                    <th class="bg-gray-200 text-gray-800 font-bold py-2 px-4">Persen</th>
                    <th class="bg-gray-200 text-gray-800 font-bold py-2 px-4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($prioritas as $prioritas)
                    <tr>
                        <td class="border py-2 px-4 text-center dark:text-white">{{ $prioritas->grade }}</td>
                        <td class="border py-2 px-4 text-center dark:text-white">{{ $prioritas->persen }}%</td>
                        <td class="border py-2 px-4 text-center">
                            <a href="{{ route('prioritas.edit', $prioritas->id) }}" class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                            <form action="{{ route('prioritas.destroy', $prioritas->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
