@extends('layouts.frontend')

@section('content')
    {{-- Botão para novas categorias --}}
    <div class="mx-20 mt-20">
        <button type="submit"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 mb-2 border border-green-500 rounded"><a
                href="{{ route('admin.categories.create') }}">Cadastrar</a></button>

        <!-- Tabela de Categorias -->
        <table class="w-auto border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr
                    class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                    <th
                        class="bg-gray-600 px-20 py-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                        Nome</th>
                    <th
                        class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                        Descrição</th>
                    <th
                        class="bg-gray-600 px-20 py-2 text-white font-bold md:border md:border-grey-500 text-center block md:table-cell">
                        Ações</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($categories as $category)
                    <tr class="bg-gray-100 even:bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="flex justify-start  w-1/3 md:hidden font-bold">Nome: </span>{{ $category->name }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell"><span
                                class="flex justify-start w-1/3 md:hidden font-bold">Descrição:
                            </span>{{ $category->description }}
                        </td>
                        <td class="p-2 md:border md:border-grey-500 text-left md:table-cell">
                            <span class="flex justify-start  w-1/3 md:hidden font-bold">Ações: </span>
                            <span class="flex justify-evenly">
                                <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded"><a
                                        href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Editar</a></button>
                                <button
                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Excluir</button>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
