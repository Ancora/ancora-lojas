@extends('layouts.frontend')

@section('content')
    <!-- component -->
    <div class="mt-10 w-screen">
        <div class="w-11/12 p-40 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-t-3xl"></div>
        <div class="w-10/12 mx-auto">
            <div class="bg-gray-900 w-full shadow rounded-b-3xl p-8 sm:p-12 -mt-72 border-2 border-blue-800">
                <p class="text-3xl font-bold leading-7 text-center text-white">Cadastrar Cor</p>
                {{-- Form --}}
                <form action="{{ route('admin.colors.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full flex flex-col md:flex-row mt-4">
                        {{-- Nome --}}
                        <div class="w-full md:w-3/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Cor</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                            @error('name')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Condição --}}
                        <div class="w-full md:w-3/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Condição de Venda</label>
                            <select name="condition"
                                class="leading-none text-gray-50 p-3.5 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded">
                                <option></option>
                                @foreach ($elements as $element)
                                    @if ($element->factor == 'CON')
                                        <option value="{{ $element->id }}">
                                            {{ $element->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('condition')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Componente --}}
                        <div class="w-full md:w-3/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Componente</label>
                            <select name="component"
                                class="leading-none text-gray-50 p-3.5 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded">
                                <option></option>
                                @foreach ($elements as $element)
                                    @if ($element->factor == 'COM')
                                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('component')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Fabricante --}}
                        <div class="w-full md:w-3/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Fabricante/Fornecedor</label>
                            <select name="maker"
                                class="leading-none text-gray-50 p-3.5 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded">
                                <option></option>
                                @foreach ($elements as $element)
                                    @if ($element->factor == 'MAK')
                                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @error('maker')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="flex w-full">
                        <div class="flex items-center justify-start w-1/2">
                            <button
                                class="py-1 px-2 mb-2 mt-4 bg-orange-500 hover:bg-orange-700 text-white font-bold border border-orange-500 rounded focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                <a href="{{ route('admin.colors.index') }}">Voltar</a>
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
