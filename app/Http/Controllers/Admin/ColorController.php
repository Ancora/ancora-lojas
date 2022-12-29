<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ColorController extends Controller
{
    /* Lista */
    public function index()
    {
        $colors = Color::all();

        return view('admin.colors.index', compact('colors'));
    }

    /* Cadastro */
    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorRequest $request)
    {
        $data = $request->validated();

        Color::create($data);

        return Redirect::route('admin.colors.create')->with('success', 'Cor cadastrada com sucesso!');
    }

    /* Edição */
    public function edit(Color $color)
    {
        return view('admin.colors.edit', compact('color'));
    }

    public function update(Color $color, ColorRequest $request)
    {
        $data = $request->validated();

        $color->update($data);

        return Redirect::route('admin.colors.index')->with('success', 'Cor alterada com sucesso!');
    }

    /* Exclusão */
    public function destroy(Color $color)
    {
        $color->delete();

        return Redirect::route('admin.colors.index')->with('success', 'Cor excluída com sucesso!');
    }
}
