<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ValidatedInput;
use PhpParser\Node\Stmt\Foreach_;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Temporário */
        $shops = Shop::all(['id', 'name']);

        return view('admin.products.create', compact('shops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        $shop = Shop::find($data['shop_id']);
        $data['slug'] = Str::slug($data['name']);

        if (Product::exists()) {
            $last_product = $this->product->latest()->first();
            $next = $last_product['id'] + 1;
            /* $major_shop = $this->product->max('code');
            $next = $major_shop + 1; */
        } else {
            $next = 1;
        }

        /* $data['code'] = (str_pad($next, 6, '0', STR_PAD_LEFT)); */
        $data['code'] = (str_pad($data['shop_id'], 2, '0', STR_PAD_LEFT) . str_pad($next, 6, '0', STR_PAD_LEFT));

        $shop->products()->create($data);

        return Redirect::route('admin.products.create')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = $this->product->findOrFail($product);
        /* Temporário */
        $shops = Shop::all(['id', 'name']);

        return view('admin.products.edit', compact('product', 'shops'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $product)
    {
        $data = $request->validated();
        //$shop = Shop::find($data['shop_id']);

        $data['slug'] = Str::slug($data['name']);

        $product = $this->product->find($product);
        $product->update($data);

        return Redirect::route('admin.products.index')->with('success', 'Produto alterado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($product)
    {
        $product = $this->product->find($product);
        $product->delete();

        return Redirect::route('admin.products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
