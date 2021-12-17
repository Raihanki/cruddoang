<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('products/index', compact('products'));
    }

    public function create()
    {
        return view('products/create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->validated();
        Product::create($data);
        session()->flash('message', "Successfullly creted new product");
        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        session()->flash('message', "Successfully updated data");
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        session()->flash('message', "Successfully deleted data");
        return redirect()->route('products.index');
    }
}
