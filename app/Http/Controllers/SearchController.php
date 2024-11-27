<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource; 

class SearchController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/products/search/{id}",
     *     tags={"Search"},
     *     summary="Buscar produto por ID",
     *     description="Retorna um produto específico pelo seu ID.",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do produto",
     *         required=true,
     *         @OA\Schema(
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Resposta bem-sucedida com detalhes do produto",
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Produto não encontrado"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno do servidor"
     *     )
     * )
     */
    public function search(Request $request, $id)
    {
        $product = Product::where('id_product', $id)->first(); // Use first() para buscar um único produto

        if ($product) {
            return new ProductResource($product);
        } else {
            return response()->json(['message' => 'Produto não encontrado'], 404);
        }
    }


    /**
     * @OA\Get(
     *     path="/api/products/searchText/{p_text}",
     *     tags={"Search"},
     *     summary="Buscar produtos pelo nome",
     *     description="Retorna uma lista de produtos cujo nome contém o termo de pesquisa.",
     *     @OA\Parameter(
     *         name="p_text",
     *         in="path",
     *         description="Termo de pesquisa (parte do nome do produto)",
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
    public function searchText(Request $request, $p_text)
    {
        $products = Product::where('name_product', 'LIKE', '%' . $p_text . '%')->get();

        if ($products->isNotEmpty()) {
            return ProductResource::collection($products);
        } else {
            return response()->json(['message' => 'Nenhum produto encontrado'], 404);
        }
    }
}