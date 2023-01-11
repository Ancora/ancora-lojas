<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
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
        $shops = Shop::all();
        $categories = Category::all();
        return view('admin.products.create', compact('shops', 'categories'));
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

        $product = $shop->products()->create($data);
        $product->categories()->sync($data['categories']);

        return Redirect::route('admin.products.create')->with('success', 'Produto cadastrado com sucesso!');
    }

    /* Edição */
    public function edit(Product $product)
    {
        $shop = Shop::find($product->shop_id);
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'shop', 'categories'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        /* $product = Product::find($product); */
        $product->update($data);
        $product->categories()->sync($data['categories']);

        return Redirect::route('admin.products.index')->with('success', 'Produto alterado com sucesso!');
    }

    /* Exclusão */
    public function destroy(Product $product)
    {
        $product->delete();

        return Redirect::route('admin.products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
