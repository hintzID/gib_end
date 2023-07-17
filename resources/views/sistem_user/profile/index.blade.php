@extends('layouts.app')
@include('layouts.navbar')

@section('content')

<body class="bg-gray-100">
    <div class="container mx-auto mt-6">
        <h1 class="text-3xl font-bold dark:text-white">Selamat Datang, {{ $user->name }}</h1>
        <p class="text-gray-500 mt-2 dark:text-gray-100">Informasi Pengguna<p>
        <div class="flex items-center mt-4 space-x-4 bg-gray-200 p-5">
            <div class="w-24 h-24 rounded-full overflow-hidden m-4">
                @if ($user->photo)
                <img class="object-cover w-full h-full" src="{{ asset('photos/' . $user->photo) }}"
                    alt="User Photo">
                @else
                <div class="flex items-center justify-center w-full h-full bg-gray-300">
                    <span class="text-red-500">(Anda mengosonginya)</span>
                </div>
                @endif
            </div>
            <div>
                <div class="mb-2">
                    <strong class="font-bold">Username:</strong>
                    <span class="italic {{ $user->name ? 'text-black' : 'text-red-500' }}">
                        {{ $user->name ?: '(Anda mengosonginya)' }}
                    </span>
                </div>
                <div>
                    <strong class="font-bold">Email:</strong>
                    <span class="italic {{ $user->email ? 'text-black' : 'text-red-500' }}">
                        {{ $user->email ?: '(Anda mengosonginya)' }}
                    </span>
                </div>
                <div>
                    <strong class="font-bold">Peran:</strong>
                    <span class="italic {{ $user->peran->peran ? 'text-black' : 'text-red-500' }}">
                        {{ $user->peran->peran ?: '(Anda mengosonginya)' }}
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto mt-6 text-right">
        <a href="{{ route('home') }}"
            class="inline-block px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Kembali</a>
    </div>
</body>

@endsection
