<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/category",
     *     tags={"Categorias"},
     *     summary="Retorna as categorias",
     *     description="Este endpoint retorna uma lista de categorias",
     *     @OA\Response(
     *         response=200,
     *         description="Resposta bem-sucedida com os dados da categoria"
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

    public function index()
    {
        // Subconsulta para selecionar o menor id_product por categoria
        $productCategory = DB::table('tab_product as tp2')
            ->select('fk_tab_category', DB::raw('MIN(id_product) AS produto_id'))
            ->groupBy('fk_tab_category');

        // Consulta principal com left join e inner join na subconsulta
        $categorys = DB::table('tab_category as tc')
            ->leftJoin('tab_product as tp', 'tp.fk_tab_category', '=', 'tc.id_category')
            ->joinSub($productCategory, 'produtos_por_categoria', function ($join) {
                $join->on('tp.id_product', '=', 'produtos_por_categoria.produto_id');
            })
            ->select('tc.*', 'tp.name_product', 'tp.id_product', 'tp.img_product')
            ->get();

        return CategoryResource::collection($categorys);
    }



}
