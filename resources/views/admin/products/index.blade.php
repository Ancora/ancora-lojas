@extends('layouts.frontend')

@section('content')
    <div class="mx-10">
        <!-- Tabela de Produtos -->
        <div class="w-full mt-20">
            <div class="w-12/12 mx-auto">
                <button type="submit"
                    class="py-1 px-2 mb-2 bg-green-500 hover:bg-green-700 text-white font-bold border border-green-500 rounded">
                    <a href="{{ route('admin.products.create') }}">Cadastrar Produto</a>
                </button>
            </div>
            <div class="w-12/12 px-40 mx-auto bg-gradient-to-b from-blue-800 to-blue-600 h-80 rounded-t-3xl">
                <div class="text-center mt-4 bg-transparent">
                    @include('common.alerts')
                </div>
            </div>
            <div class="w-12/12 ml-2 mr-2">
                <div class="bg-gray-900 w-full shadow rounded-b-3xl p-4 -mt-72 border-2 border-blue-800">
                    <table class="bg-gray-900 w-full border-2 border-blue-800">
                        <thead class="block md:table-header-group">
                            <tr
                                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                                <th class="bg-gray-600 px-2 py-2 text-white font-bold text-center block md:table-cell">
                                    Código</th>
                                <th class="bg-gray-600 px-20 py-2 text-white font-bold text-center block md:table-cell">
                                    Produto</th>
                                <th class="bg-gray-600 px-2 py-2 text-white font-bold text-center block md:table-cell">
                                    Estoque</th>
                                <th class="bg-gray-600 px-5 py-2 text-white font-bold text-center block md:table-cell">
                                    Preço</th>
                                <th class="bg-gray-600 px-2 text-white font-bold text-center block md:table-cell">
                                    Descrição</th>
                                <th class="bg-gray-600 px-20 py-2 text-white font-bold text-center block md:table-cell">
                                    Ações</th>
                            </tr>
                        </thead>
                        <tbody class="block md:table-row-group">
                            @foreach ($products as $product)
                                <tr class="bg-transparent even:bg-gray-500 md:border-none block md:table-row">
                                    <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                            class="flex justify-start  w-1/3 md:hidden font-bold">Código:
                                        </span>{{ $product->code }}
                                    </td>
                                    <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                            class="flex justify-start  w-1/3 md:hidden font-bold">Nome:
                                        </span>{{ $product->name }}
                                    </td>
                                    <td class="p-2 text-center text-gray-100 block md:table-cell"><span
                                            class="flex justify-start  w-1/3 md:hidden font-bold">Estoque:
                                        </span>{{ $product->stock }}
                                    </td>
                                    <td class="p-2 text-right text-gray-100 block md:table-cell"><span
                                            class="flex justify-start w-1/3 md:hidden font-bold">Preço:
                                        </span>{{ number_format($product->price, 2, ',', '.') }}
                                    </td>
                                    <td class="p-2 text-left text-gray-100 block md:table-cell"><span
                                            class="flex justify-start w-1/3 md:hidden font-bold">Descrição:
                                        </span>{{ $product->description }}
                                    </td>
                                    <td class="p-2 text-left text-gray-100 md:table-cell">
                                        <span class="flex justify-start  w-1/3 md:hidden font-bold">Ações: </span>
                                        <span class="flex sm:justify-evenly">
                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">
                                                <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}">
                                                    Editar
                                                </a>
                                            </button>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Excluir
                                                </button>
                                            </form>

                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <span>
                            {{ $products->links() }}
                        </span>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
