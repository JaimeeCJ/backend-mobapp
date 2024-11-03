<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products",
     *     tags={"Popular"},
     *     summary="Todos os produtos",
     *     description="Produtos Populares.",
     *     @OA\Response(
     *         response=200,
     *         description="Resposta bem-sucedida com a lista de Produtos Populares.",     
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno do servidor."
     *     )
     * )
     */

    public function index()
    {
        $products = Product::take(4)->get(); 
        return ProductResource::collection($products); 
    }

}