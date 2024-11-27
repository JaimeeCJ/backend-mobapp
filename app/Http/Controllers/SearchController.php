<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource; 

class SearchController extends Controller
{
    // ... outras funções

    /**
     * @OA\Get(
     *     path="/api/products/search/{id}",
     *     tags={"Search"},
     *     summary="Buscar produtos por ID",
     *     description="Retorna uma lista de produtos que correspondem ao termo de pesquisa.",
     *     @OA\Parameter(
     *         name="query",
     *         in="path",
     *         description="Termo de pesquisa",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Resposta bem-sucedida com a lista de produtos encontrados",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Nenhum produto encontrado"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno do servidor"
     *     )
     * )
     */
    public function search(Request $request, $id)
    {
        $products = Product::where('id_product', $id)->get();
        if ($products->count() > 0) {
            return ProductResource::collection($products); 
        } else {
            return response()->json(['message' => 'Nenhum produto encontrado'], 404);
        }
    }
}