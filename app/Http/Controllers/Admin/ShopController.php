<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShopRequest;
use App\Models\Shop;
use App\Models\User;
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
        /* $users = User::all(['id', 'name']);

        return view('admin.shops.create', compact('users')); */
        return view('admin.shops.create');
    }

    public function store(ShopRequest $request)
    {
        /* $data = $request->all(); */
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);

        /* Temporário */
        /* $user = User::find($data['user']);
        $shop = $user->shops()->create($data); */

        Shop::create($data);

        return Redirect::route('admin.shops.create')->with('success', 'Loja cadastrada com sucesso!');
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
