<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Shop;
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
        /* Temporário */
        $shops = Shop::all(['id', 'name']);

        return view('admin.products.create', compact('shops'));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $shop = Shop::find($data['shop_id']);
        $data['slug'] = Str::slug($data['name']);

        if (Product::exists()) {
            //$last_product = $this->product->latest()->first();
            $last_product = Product::latest()->first();
            $next = $last_product['id'] + 1;
        } else {
            $next = 1;
        }

        $data['code'] = (str_pad($data['shop_id'], 2, '0', STR_PAD_LEFT) . str_pad($next, 6, '0', STR_PAD_LEFT));

        $shop->products()->create($data);

        return Redirect::route('admin.products.create')->with('success', 'Produto cadastrado com sucesso!');
    }

    /* Edição */
    public function edit(Product $product)
    {
        /* Temporário */
        $shops = Shop::all(['id', 'name']);

        return view('admin.products.edit', compact('product', 'shops'));
    }

    public function update(ProductRequest $request, Product $product)
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
