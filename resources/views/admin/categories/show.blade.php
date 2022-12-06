@extends('layouts.frontend')

@section('content')
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registro</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="flex flex-wrap md:flex-row items-center justify-between">
            @foreach ($categories as $category)
                {{-- <div class="min-h-full pb-12"> --}}
                <div class="2xl:w-1/3 flex flex-row items-center justify-center px-8 md:px-32 lg:px-16 2xl:px-0">
                    <div class="w-full grid grid-cols-1 p-2">
                        <div class="card shadow-2xl rounded-lg py-4">
                            <img src="/../../assets/img/no-photo.jpg" alt="" class="rounded-lg">
                            <p class="text-xl text-center font-bold text-blue-600">{{ $category->name }}</p>
                            <p class="text-center py-8 h-64">
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            @endforeach
        </div>

    </div>
@endsection
