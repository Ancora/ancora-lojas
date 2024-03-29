<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use App\Models\Element;
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
        $elements = Element::all();

        return view('admin.colors.create', compact('elements'));
    }

    public function store(ColorRequest $request)
    {
        $data = $request->validated();
        $condition = Element::find($data['condition']);
        $data['condition'] = $condition->name;
        $component = Element::find($data['component']);
        $data['component'] = $component->name;
        $maker = Element::find($data['maker']);
        $data['maker'] = $maker->name;

        Color::create($data);
        /* $element->colors()->create($data); */

        return Redirect::route('admin.colors.create')->with('success', 'Cor cadastrada com sucesso!');
    }

    /* Edição */
    public function edit(Color $color)
    {
        $elements = Element::all();
        return view('admin.colors.edit', compact('color', 'elements'));
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
