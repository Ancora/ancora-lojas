<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /* Lista */
    public function index()
    {
        $products = Product::paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /* Cadastro */
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        /* Temporário */
        $data['code'] = "abcdef";
        $data['shop_id'] = "1";
        $data['order_id'] = "1";
        dd($data);

        Product::create($data);

        return Redirect::route('admin.products.create')->with('success', 'Produto criado com sucesso!');
    }

    /* Edição */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Product $product, ProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $product->update($data);

        return Redirect::route('admin.products.index')->with('success', 'Produto alterado com sucesso!');
    }

    /* Exclusão */
    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::route('admin.products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
