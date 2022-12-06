<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /* Lista */
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    /* Cadastro */
    public function create()
    {
        return view('admin.categories.create');
    }

    public function store()
    {
        return ('ok');
    }
}
