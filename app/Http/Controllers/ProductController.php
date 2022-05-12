<?php

namespace App\Http\Controllers;
use Add\models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view("/index", compact("products"));
    }

    public function create()
    {
        return view("/add");
    }

    public function store(Request $request)
    {
        $products = new Product();
        $products->Name = $request->Name;
        $products->Price = $request->Price;
        $products->Quantity = $request->Quantity;
        $products->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->back();
    }
}
