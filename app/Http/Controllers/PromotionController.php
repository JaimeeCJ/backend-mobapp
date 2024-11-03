<?php

namespace App\Http\Controllers;

use App\Http\Resources\PromotionResource;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
     /**
     * @OA\Get(
     *     path="/api/promotion/{qty}",
     *     tags={"Promoção"},
     *     summary="Retorna com base na quantidade enviada as melhores promoções",
     *     description="Este endpoint retorna uma lista de produtos em promoção",
     *     @OA\Parameter(
     *         name="qty",
     *         in="path",
     *         required=true,
     *         description="Quantidade de itens a serem retornados"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Resposta bem-sucedida com os dados do usuário."
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Usuário não encontrado."
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno do servidor."
     *     )
     * )
     */
    public function index($num_register)
    { 
        $promotions = Promotion::with('category')->orderBy('num_percentage', 'desc')->limit($num_register)->get();
        return PromotionResource::collection($promotions);
    }

}
