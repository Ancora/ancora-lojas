@extends('layouts.frontend')

@section('content')
    <!-- component -->
    <div class="w-screen">
        <div class="w-11/12 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-t-3xl"></div>
        <div class="w-10/12 mx-auto">
            <div class="bg-gray-900 w-full shadow rounded-b-3xl p-4 md:p-20 -mt-72 border-2 border-blue-800">
                <p class="text-3xl font-bold leading-7 text-center text-white">Editar Produto</p>
                {{-- Form --}}
                <form action="{{ route('admin.products.update', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="w-full flex flex-col md:flex-row mt-4">
                        {{-- Nome --}}
                        <div class="w-full md:w-3/4 mr-2 flex flex-row">
                            <div class="w-full md:w-1/6 mr-2 flex flex-col">
                                <label class="font-semibold leading-none text-blue-300">Código</label>
                                <label
                                    class="leading-none text-blue-500 text-lg pt-4 focus:outline-none focus:border-blue-700 mt-4 border-0 rounded">{{ $product->code }}</label>
                            </div>
                            <div class="w-full md:w-5/6 mr-2 flex flex-col">
                                <label class="font-semibold leading-none text-gray-300">Nome</label>
                                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                    class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                                @error('name')
                                    <span class="text-red-600">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- Preço --}}
                        <div class="w-full mt-4 md:mt-0 md:w-1/4 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Preço</label>
                            <input name="price" value="{{ old('price', $product->price) }}"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                            @error('price')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    {{-- Descrição --}}
                    <div class="w-full flex flex-col mt-4">
                        <label class="font-semibold leading-none text-gray-300">Descrição</label>
                        <textarea type="text" name="description"
                            class="h-20 text-base leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 bg-gray-800 border-0 rounded">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <span class="text-red-600">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="w-full flex flex-row mt-4">
                        {{-- Estoque --}}
                        <div class="w-1/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Estoque</label>
                            <input type="text" name="stock" value="{{ old('stock', $product->stock) }}"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                            @error('stock')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Largura --}}
                        <div class="w-1/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Largura</label>
                            <input name="width" value="{{ old('width', $product->width) }}"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                            @error('width')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Altura --}}
                        <div class="w-1/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Altura</label>
                            <input name="height" value="{{ old('height', $product->height) }}"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                            @error('height')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Comprimento --}}
                        <div class="w-1/4 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300">Comprimento</label>
                            <input name="length" value="{{ old('length', $product->length) }}"
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded" />
                            @error('length')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="w-full flex flex-row mt-4">
                        {{-- Lojas --}}
                        <div class="w-1/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300 ">Loja</label>
                            <div
                                class="leading-none text-gray-50 p-3 focus:outline-none focus:border-blue-700 mt-4 border-0 bg-gray-800 rounded"">
                                <input type="radio" name="shop_id" value="{{ $product->shop_id }}"
                                    class="form-radio mr-2" checked @disabled(true)>
                                <label>
                                    {{ $shop->name }}
                                </label>
                            </div>
                        </div>
                        {{-- Categorias --}}
                        <div class="w-1/4 mr-2 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300 ">Categorias</label>
                            <div class="flex flex-col mt-4 justify-between text-gray-300">
                                @foreach ($categories as $category)
                                    @if ($category->status == 1)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="categories[]" id=""
                                                value="{{ $category->id }}"
                                                @if ($product->categories->contains($category)) checked @endif class="form-checkbox mr-2">
                                            <span>{{ $category->name }}</span>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                            @error('categories')
                                <span class="text-red-600">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        {{-- Cores --}}
                        <div class="w-1/4 flex flex-col">
                            <label class="font-semibold leading-none text-gray-300 ">Cores</label>
                        </div>
                    </div>
                    {{-- Botões --}}
                    <div class="flex w-full">
                        <div class="flex items-center justify-start w-1/2">
                            <button
                                class="py-1 px-2 mb-2 mt-4 bg-orange-500 hover:bg-orange-700 text-white font-bold border border-orange-500 rounded focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                <a href="{{ route('admin.products.index') }}">Voltar</a>
                            </button>
                        </div>
                        <div class="flex items-center justify-end w-1/2">
                            <button type="submit"
                                class="flex justify-end py-1 px-2 mb-2 mt-4 bg-green-500 hover:bg-green-700 text-white font-bold border border-green-500 rounded focus:ring-2 focus:ring-offset-2 focus:ring-blue-700 focus:outline-none">
                                Alterar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
