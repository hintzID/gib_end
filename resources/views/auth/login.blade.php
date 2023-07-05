@extends('layouts.app')
@include('layouts.navbar')

@section('content')
    <div class="container  mx-auto sm:px-4">
        <div class="flex flex-wrap  justify-center">
            <div class="md:w-2/3 pr-4 pl-4">
                <div class="relative flex flex-col min-w-0 rounded-lg break-words bg-white dark:bg-blue-900 dark:text-white border-1 shadow-lg border-gray-300">
                    <div class="py-3 px-6 mb-0 bg-purple-200 rounded-t-lg dark:bg-blue-950 dark:text-white border-b-1 border-gray-300 text-gray-900">{{ __('Login') }}
                    </div>

                    @if (session('success'))
                        <div
                            class="relative px-3 py-3 mb-4 border rounded bg-purple-200 dark:bg-blue-900 dark:text-white border-green-300 text-green-800">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="flex-auto p-6">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="mb-6">
                                <label for="email"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                <input type="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="email" value="{{ old('email') }}" required autofocus>

                                @error('email')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-6">
                                <label for="password"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                    password</label>
                                <input type="password" id="password"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-500 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="password" required>

                                @error('password')
                                    <span class="hidden mt-1 text-sm text-red" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="flex items-start mb-6">
                                <div class="flex items-center h-5">
                                    <input id="remember" type="checkbox"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-500 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                        name="remember" {{ old('remember') ? 'checked' : '' }}>
                                </div>
                                <label for="remember"
                                    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                            </div>

                            <button type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
