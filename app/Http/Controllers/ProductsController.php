<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Http\Requests\StoreOrUpdateProductsRequest;

class ProductsController extends Controller
{
    public function index () { 
        $products = Products::select("id", "name") -> get() -> all();

        return view("products.index", [
            "products" => $products
        ]);
    }

    public function create () { 
        return view('products.create');
    }

    public function store (StoreOrUpdateProductsRequest $request) { 

        $data = $request -> all();

        $product = new Products();
        $product -> name = $request -> name;
        $product -> sku = $request -> sku;
        $product -> description = $request -> description;

        $product -> save();


        return redirect("admin/produtos");

    }

    public function show($id) {

    $product = Products::findOrFail($id);

    return view("products.show", [
        "product" => $product
    ]);
    }

    public function edit($id) {

        $product = Products::findOrFail($id);

        return view("products.edit", [
            "product" => $product
        ]);
    }

    public function update(StoreOrUpdateProductsRequest $request, $id) {

        $product = Products::where("id", $id) -> update([
            "name" => $request -> name,
            "sku" => $request -> sku,
            "description" => $request -> description
        ]);

        return redirect("admin/produtos");

    }

    public function destroy($id) {

        Products::where("id", $id) -> delete();


        return redirect("admin/produtos");
    }
}

