@extends('layouts.frontend')

@section('content')
    <!-- component -->
    <div class="w-screen">
        <div class="w-11/12 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-t-3xl"></div>
        <div class="w-10/12 mx-auto">
            <div class="bg-gray-900 w-full shadow rounded-b-3xl p-4 md:p-20 -mt-72 border-2 border-blue-800">
                <p class="text-3xl font-bold leading-7 text-center text-white">Editar Loja</p>
                {{-- Form --}}
                <form action="{{ route('admin.shops.update', $shop->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full flex flex-col md:flex-row mt-4">
                        {{-- Nome --}}
                        <div class="w-full md:w-3/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Nome</label>
                            <input type="text" id="name" name="name" value="{{ old('name', $shop->name) }}"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                            @error('name')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Status --}}
                        <div class="w-full md:w-1/4 flex flex-col mr-2 mx-auto">
                            <label class="font-semibold leading-none text-gray-300 ">Situação</label>
                            <div class="flex flex-row mt-4 justify-evenly text-gray-300">
                                <label>
                                    <input type="radio" name="status" value="1"
                                        {{ $shop->status == 1 ? 'checked' : '' }}>
                                    Ativa
                                </label>
                                <label>
                                    <input type="radio" name="status" value="0"
                                        {{ $shop->status == 0 ? 'checked' : '' }}>
                                    Inativa
                                </label>
                            </div>
                            @error('status')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Descrição --}}
                    <div class="w-full flex flex-col mt-8">
                        <label class="font-semibold leading-none text-gray-300">Descrição</label>
                        <textarea type="text" id="description" name="description"
                            class="h-20 text-base leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-800 border-0 rounded">{{ old('description', $shop->description) }}</textarea>
                        @error('description')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
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
                                Alterar
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
