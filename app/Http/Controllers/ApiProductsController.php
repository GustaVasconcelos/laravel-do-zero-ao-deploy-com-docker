<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Exception;

class ApiProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $products = Products::get();
    
            return response($products, 200);

        } catch(Exception $exception) {
            return response([
                "success" => false,
                "message" => "Houve um erro ao mostrar os produtos"
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$data = $request -> all();
        try {
            $product = Products::create([
                "name" => $request->name,
                "sku" => $request->sku,
                "description" => $request->description,
            ]);

            if (!$product) { 
                return response([
                    "success" => false,
                    "message" => "Produtos não cadastrado"
                ], 400);
            }

            return response($product, 201);
        } catch (Exception $exception) {

            return response([
                "success" => false,
                "message" => "Houve um erro ao salvar o produto"
            ], 500);
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $product = Products::find($id);

            if (!$product) { 
                return response([
                    "success" => false,
                    "message" => "Produto não encontrado"
                ], 400);
            }
    
            return response($product, 200);

        } catch(Exception $exception) {
            return response([
                "success" => false,
                "message" => "Houve um erro ao mostrar o produto"
            ], 500);
        }
    }

    
    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        try {

            $product = Products::where("id", $id) -> update([
                "name" => $request -> name,
                "sku" => $request -> sku,
                "description" => $request -> description
            ]);
            
            if (!$product) { 
                return response([
                    "success" => false,
                    "message" => "Produto não encontrado"
                ], 400);
            }

            return response([
                "success" => true,
                "message" => "Produto atualizado com sucesso"
            ], 200);

        } catch(Exception $exception) {
            return response([
                "success" => false,
                "message" => "Houve um erro ao atualizar o produto"
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {

            $product = Products::where("id", $id) -> delete();
            
            if (!$product) { 
                return response([
                    "success" => false,
                    "message" => "Produto não encontrado"
                ], 400);
            }

            return response([
                "success" => true,
                "message" => "Produto deletado com sucesso"
            ], 200);

        } catch(Exception $exception) {
            return response([
                "success" => false,
                "message" => "Houve um erro ao deletar o produto"
            ], 500);
        }
        
    }
}
