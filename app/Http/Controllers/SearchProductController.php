<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use TecnickCom\Struct\String\Similarity\Levenshtein;

class SearchProductController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products/search/{query}",
     *     tags={"Search"},
     *     summary="Buscar produtos pelo nome",
     *     description="Retorna uma lista de produtos que correspondem ao termo de pesquisa no nome.",
     *     @OA\Parameter(
     *         name="query",
     *         in="path",
     *         description="Termo de pesquisa (nome do produto)",
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

public function search(Request $request, $query)
{
    $levenshtein = new Levenshtein();
    $products = Product::all(); 

    $results = [];
    foreach ($products as $product) {
        $similarity = $levenshtein->compare($query, $product->name_product);
        if ($similarity >= 0.6) { 
            $results[] = $product;
        }
    }

    if (!empty($results)) {
        return ProductResource::collection($results);
    } else {
        return response()->json(['message' => 'Nenhum produto encontrado'], 404);
    }
}
}