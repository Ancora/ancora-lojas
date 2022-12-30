<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ElementRequest;
use App\Models\Element;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ElementController extends Controller
{
    /* Lista */
    public function index()
    {
        $elements = Element::all();

        return view('admin.elements.index', compact('elements'));
    }

    /* Cadastro */
    public function create()
    {
        return view('admin.elements.create');
    }

    public function store(ElementRequest $request)
    {
        $data = $request->validated();

        Element::create($data);

        return Redirect::route('admin.elements.create')->with('success', 'Elemento cadastrado com sucesso!');
    }

    /* Edição */
    public function edit(Element $element)
    {
        return view('admin.elements.edit', compact('element'));
    }

    public function update(Element $element, ElementRequest $request)
    {
        $data = $request->validated();

        $element->update($data);

        return Redirect::route('admin.elements.index')->with('success', 'Elemento alterado com sucesso!');
    }

    /* Exclusão */
    public function destroy(Element $element)
    {
        $element->delete();

        return Redirect::route('admin.elements.index')->with('success', 'Elemento excluído com sucesso!');
    }
}
