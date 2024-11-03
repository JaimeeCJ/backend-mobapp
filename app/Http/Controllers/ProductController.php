<?php

namespace App\Http\Controllers;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products/{qty}",
     *     tags={"Popular"},
     *     summary="Todos os produtos",
     *     description="Produtos Populares.",
     *      @OA\Parameter(
     *         name="qty",
     *         in="path",
     *         required=false,
     *         description="Quantidade de itens a serem retornados"
     *     ),
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

    public function index($num_register)
    {
        $products = Product::take($num_register)->get(); 
        return ProductResource::collection($products); 
    }

}