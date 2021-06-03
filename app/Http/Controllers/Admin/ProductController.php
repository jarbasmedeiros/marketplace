<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->latest()->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $stores = \App\Store::all(['id', 'name']);

        return view('admin.products.create', compact('stores'));
    }

    public function store(ProductRequest $request)
    {
        $store = auth()->user()->store;
        $store->products()->create($request->all());

        flash('Produto cadastrado com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    public function show($id)
    {

    }

    public function edit($product)
    {
        $product = $this->product->find($product);

        return view('admin.products.edit', compact('product'));
    }

    public function update(ProductRequest $request, $product)
    {
        $product = $this->product->find($product);
        $product->update($request->all());

        flash('Produto alterado com sucesso!')->success();
        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $product = $this->product->find($id);
        $product->delete();

        flash('Produto removido com sucesso!')->success();
        return redirect()->back();
    }
}