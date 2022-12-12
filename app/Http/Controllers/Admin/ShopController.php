<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ShopController extends Controller
{
    /* Lista */
    public function index()
    {
        $shops = Shop::all();

        return view('admin.shops.index', compact('shops'));
    }

    /* Cadastro */
    public function create()
    {
        return view('admin.shops.create');
    }

    public function store(ShopRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        Shop::create($data);

        return dd($data);
    }

    /* Edição */
    public function edit(Shop $shop)
    {
        return view('admin.shops.edit', compact('shop'));
    }

    public function update(Shop $shop, ShopRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        $shop->update($data);

        return Redirect::route('admin.shops.index')->with('success', 'Loja alterada com sucesso!');
    }

    /* Exclusão */
    public function destroy(Shop $shop)
    {
        $shop->delete();

        return Redirect::route('admin.shops.index')->with('success', 'Loja excluída com sucesso!');
    }
}