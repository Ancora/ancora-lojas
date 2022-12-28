@extends('layouts.frontend')

@section('content')
    {{-- Botão para novas categorias --}}
    <div class="mx-10">
        <!-- Tabela de Categorias -->
        <div class="w-screen mt-20">
            <div class="w-11/12 mx-auto">
                <button type="submit"
                    class="py-1 px-2 mb-2 bg-green-500 hover:bg-green-700 text-white font-bold border border-green-500 rounded">
                    <a href="{{ route('admin.categories.create') }}">Cadastrar Categoria</a>
                </button>
            </div>
            <div class="w-11/12 px-40 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-t-3xl">
                <div class="text-center mt-4 bg-transparent">
                    @include('common.alerts')
                </div>
            </div>
            @if (is_null($categories) || $categories->count() == 0)
                <div class="w-11/12 mx-auto">
                    <div class="bg-gray-900 w-full shadow rounded-b-3xl p-4 -mt-72 border-2 h-64 border-blue-800">
                        <table class="w-full border-2 my-20 border-blue-800">
                            <thead class="block md:table-header-group">
                                <tr
                                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                                    <th class="px-3 py-2 text-white font-bold text-center block md:table-cell">
                                        Nenhuma Categoria cadastrada!</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            @else
                <div class="w-10/12 mx-auto">
                    <div class="bg-gray-900 w-full shadow rounded-b-3xl p-8 sm:p-12 -mt-72 border-2 border-blue-800">
                        <table class="bg-gray-900 w-full border-2 border-blue-800">
                            <thead class="block md:table-header-group">
                                <tr
                                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                    <th class="bg-gray-600 px-3 py-2 text-white font-bold text-center block md:table-cell">
                                        ID</th>
                                    <th class="bg-gray-600 px-20 py-2 text-white font-bold text-center block md:table-cell">
                                        Categoria</th>
                                    <th class="bg-gray-600 px-5 py-2 text-white font-bold text-center block md:table-cell">
                                        Situação
                                    </th>
                                    <th class="bg-gray-600 px-20 text-white font-bold text-center block md:table-cell">
                                        Descrição</th>
                                    <th class="bg-gray-600 px-2 py-2 text-white font-bold text-center block md:table-cell">
                                        Ações</th>
                                </tr>
                            </thead>
                            <tbody class="block md:table-row-group">
                                @foreach ($categories as $category)
                                    <tr class="bg-transparent even:bg-gray-500 md:border-none block md:table-row">
                                        <td class="p-2 px-3 text-center text-gray-100 block md:table-cell"><span
                                                class="flex justify-start  w-1/3 md:hidden font-bold">ID:
                                            </span>{{ $category->id }}
                                        </td>
                                        <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                                class="flex justify-start  w-2/6 md:hidden font-bold">Nome:
                                            </span>{{ $category->name }}
                                        </td>
                                        <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                                class="flex justify-start  w-1/6 md:hidden font-bold">Situação:
                                            </span>
                                            @if ($category->status == 1)
                                                <pre class="bg-green-500 text-center rounded-full">Ativa</pre>
                                            @else
                                                <pre class="bg-red-500 text-center rounded-full">Inativa</pre>
                                            @endif
                                        </td>
                                        <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                                class="flex justify-start w-2/6 md:hidden font-bold">Descrição:
                                            </span>{{ $category->description }}
                                        </td>
                                        <td class="p-2 text-left text-gray-100 md:table-cell">
                                            <span class="flex justify-start  w-1/6 md:hidden font-bold">Ações: </span>
                                            <span class="flex sm:justify-evenly">
                                                <button type="submit"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                                    <a
                                                        href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                                        Editar
                                                    </a>
                                                </button>
                                                <button
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">
                                                    <a href="{{ route('admin.categories.destroy', $category->id) }}">
                                                        Excluir
                                                    </a>
                                                </button>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif

        </div>
    </div>
@endsection
