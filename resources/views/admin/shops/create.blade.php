@extends('layouts.frontend')

@section('content')
    <!-- component -->
    <div class="mt-10 w-screen">
        <div class="w-11/12 p-40 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-t-3xl"></div>
        <div class="w-10/12 mx-auto">
            <div class="bg-gray-900 w-full shadow rounded-b-3xl p-8 sm:p-12 -mt-72 border-2 border-blue-800">
                <p class="text-3xl font-bold leading-7 text-center text-white">Cadastrar Loja</p>
                {{-- Form --}}
                <form action="{{ route('admin.shops.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full flex flex-col mt-8">
                        {{-- Nome --}}
                        <label class="font-semibold leading-none text-gray-300">Nome</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                        @error('name')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Descrição --}}
                    <div class="w-full flex flex-col mt-8">
                        <label class="font-semibold leading-none text-gray-300">Descrição</label>
                        <textarea type="text" name="description"
                            class="h-20 text-base leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-800 border-0 rounded">{{ old('description') }}</textarea>
                        @error('description')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    {{-- Imagem --}}
                    {{-- <div class="w-full flex flex-col mt-8">
                        <label class="font-semibold leading-none text-gray-300 mb-4">Imagem</label>
                        <input type="file" name="image"
                            class="w-full bg-gray-100 bg-opacity-50 rounded border border-gray-300 focus:border-indigo-500 focus:bg-white focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out" />
                        @error('image')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div> --}}
                    <div class="flex w-full">
                        <div class="flex items-center justify-start w-1/2">
                            <button
                                class="py-1 px-2 mb-2 mt-4 bg-orange-500 hover:bg-orange-700 text-white font-bold border border-orange-500 rounded focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                <a href="{{ route('admin.shops.index') }}">Voltar</a>
                            </button>
                        </div>
                        <div class="flex items-center justify-end w-1/2">
                            <button type="submit"
                                class="flex justify-end py-1 px-2 mb-2 mt-4 bg-green-500 hover:bg-green-700 text-white font-bold border border-green-500 rounded focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                    <div class="text-center mt-4 bg-transparent">
                        @include('common.alerts')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
