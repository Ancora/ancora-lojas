@extends('layouts.frontend')

@section('content')
    {{-- Botão para novas categorias --}}
    <div class="mx-10 mt-20">


        <!-- Tabela de Categorias -->
        <div class="mt-2 w-screen">
            <div class="w-3/4 md:w-4/6 mx-auto">
                <button type="submit"
                    class="py-1 px-2 mb-2 bg-green-500 hover:bg-green-700 text-white font-bold border border-green-500 rounded">
                    <a href="{{ route('admin.categories.create') }}">Cadastrar Categoria</a>
                </button>
            </div>
            {{-- <div class="w-4/5 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-lg"></div> --}}
            <div class="w-3/4 md:w-4/6 p-40 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-t-3xl"></div>
            {{-- <div class="w-4/5 mx-auto px-6 sm:px-6 lg:px-8 mb-12"> --}}
            <div class="w-3/4 md:w-3/5 mx-auto">
                <table class="bg-gray-900 w-full p-8 sm:p-12 -mt-72 border-2 border-blue-800">
                    <thead class="block md:table-header-group">
                        <tr
                            class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                            <th class="bg-gray-600 px-20 py-2 text-white font-bold text-center block md:table-cell">
                                Nome</th>
                            <th class="bg-gray-600 p-2 text-white font-bold text-center block md:table-cell">
                                Descrição</th>
                            <th class="bg-gray-600 px-20 py-2 text-white font-bold text-center block md:table-cell">
                                Ações</th>
                        </tr>
                    </thead>
                    <tbody class="block md:table-row-group">
                        @foreach ($categories as $category)
                            <tr class="bg-transparent even:bg-gray-500 md:border-none block md:table-row">
                                <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                        class="flex justify-start  w-1/3 md:hidden font-bold">Nome:
                                    </span>{{ $category->name }}
                                </td>
                                <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                        class="flex justify-start w-1/3 md:hidden font-bold">Descrição:
                                    </span>{{ $category->description }}
                                </td>
                                <td class="p-2 text-left text-gray-100 md:table-cell">
                                    <span class="flex justify-start  w-1/3 md:hidden font-bold">Ações: </span>
                                    <span class="flex sm:justify-evenly">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                            <a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                                Editar
                                            </a>
                                        </button>
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">
                                            Excluir
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
